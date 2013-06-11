<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: PluginMatcherTest.php 44444 2013-01-05 21:24:24Z changi67 $

/**
 * @group unit
 *
 */

class WikiParser_PluginMatcherTest extends TikiTestCase
{
	function toArray($matcher)
	{
		$ret = array();
		foreach ($matcher as $match) {
			$ret[] = $match;
		}

		return $ret;
	}

	function doMatch($string, $expecting)
	{
		$matches = WikiParser_PluginMatcher::match($string);

		$ret = $this->toArray($matches);

		$this->assertEquals($expecting, count($matches));
		$this->assertEquals($expecting, count($ret));

		return $ret;
	}

	function testShortMatch()
	{
		$matches = $this->doMatch(' {img src=foo.png} ', 1);

		$match = $matches[0];
		$this->assertEquals('img', $match->getName());
		$this->assertEquals('src=foo.png', $match->getArguments());
		$this->assertEquals(null, $match->getBody());
		$this->assertEquals(1, $match->getStart());
		$this->assertEquals(18, $match->getEnd());
	}

	function testShortLegacySyntax()
	{
		$matches = $this->doMatch(' {IMG(src=foo.png)/} ', 1);

		$match = $matches[0];
		$this->assertEquals('img', $match->getName());
		$this->assertEquals('src=foo.png', $match->getArguments());
		$this->assertEquals(null, $match->getBody());
		$this->assertEquals(1, $match->getStart());
		$this->assertEquals(20, $match->getEnd());
	}

	function testFullMatch()
	{
		$matches = $this->doMatch('{DIV(hello=>world)} foobar {DIV}', 1);

		$match = $matches[0];
		$this->assertEquals('div', $match->getName());
		$this->assertEquals('hello=>world', $match->getArguments());
		$this->assertEquals(' foobar ', $match->getBody());
		$this->assertEquals(0, $match->getStart());
		$this->assertEquals(32, $match->getEnd());
	}

	function testNestedShortMatch()
	{
		$matches = $this->doMatch('{A(foo=>bar)} {a hello=world} {A}', 2);

		$match = $matches[0];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('foo=>bar', $match->getArguments());
		$this->assertEquals(' {a hello=world} ', $match->getBody());
		$this->assertEquals(0, $match->getStart());
		$this->assertEquals(33, $match->getEnd());

		$match = $matches[1];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('hello=world', $match->getArguments());
		$this->assertEquals(null, $match->getBody());
		$this->assertEquals(14, $match->getStart());
		$this->assertEquals(29, $match->getEnd());

		$this->assertTrue($matches[1]->inside($matches[0]));
		$this->assertFalse($matches[0]->inside($matches[1]));
	}

	function testSideBySideFullMatch()
	{
		$matches = $this->doMatch('{A(hello=world)} middle {A} between {A(bar=baz)} center {A}', 2);

		// Make sure the matches found are those we expect

		$match = $matches[0];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('hello=world', $match->getArguments());
		$this->assertEquals(' middle ', $match->getBody());

		$match = $matches[1];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('bar=baz', $match->getArguments());
		$this->assertEquals(' center ', $match->getBody());

		// Corrolary of the above
		$this->assertFalse($matches[0]->inside($matches[1]));
		$this->assertFalse($matches[1]->inside($matches[0]));
	}

	function testNestedFullMatch()
	{
		$matches = $this->doMatch('{A(foo=>bar)} {A(hello=world)} middle {A} between {A(bar=baz)} center {A} {A}', 3);

		// Make sure the matches found are those we expect

		$match = $matches[0];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('foo=>bar', $match->getArguments());
		$this->assertEquals(' {A(hello=world)} middle {A} between {A(bar=baz)} center {A} ', $match->getBody());

		$match = $matches[1];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('hello=world', $match->getArguments());
		$this->assertEquals(' middle ', $match->getBody());

		$match = $matches[2];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('bar=baz', $match->getArguments());
		$this->assertEquals(' center ', $match->getBody());

		// The two inner matches are inside the outer
		$this->assertTrue($matches[1]->inside($matches[0]));
		$this->assertTrue($matches[2]->inside($matches[0]));

		// Corrolary of the above
		$this->assertFalse($matches[0]->inside($matches[1]));
		$this->assertFalse($matches[0]->inside($matches[2]));

		// The two inner matches are not within each other
		$this->assertFalse($matches[1]->inside($matches[2]));
		$this->assertFalse($matches[2]->inside($matches[1]));
	}

	function testUnclosedFullMatch()
	{
		$matches = $this->doMatch('{A(unclosed=>bar)} {A(unclosed=world)} middle {A}', 1);

		$match = $matches[0];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('unclosed=world', $match->getArguments());
		$this->assertEquals(' middle ', $match->getBody());
	}

	function testQuotesSkipInArguments()
	{
		$matches = $this->doMatch('{a foo=>"bar \" } {"}', 1);

		$match = $matches[0];
		$this->assertEquals('a', $match->getName());
		$this->assertEquals('foo=>"bar \" } {"', $match->getArguments());
	}

	function testSkipNoParse()
	{
		$matches = $this->doMatch('{A()} ~np~ {A} {b} {B()} {B} ~/np~ {A} ~np~ {b} ~/np~', 1);
		$this->assertEquals(' ~np~ {A} {b} {B()} {B} ~/np~ ', $matches[0]->getBody());
	}


	function testVerySimpleMatch()
	{
		$string = '{c}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(1, count($matches));
	}

	function testSimpleReplacement()
	{
		$string = '{c} {A()} {b} {A} {b}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$orig = $this->toArray($matches);

		$orig[2]->replaceWith('Hello');

		$this->assertEquals('{c} {A()} Hello {A} {b}', $matches->getText());
	}

	function testLegacyReplacement()
	{
		$string = '{c} {A()} {B()/} {A} {b}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$orig = $this->toArray($matches);

		$orig[2]->replaceWith('Hello');

		$this->assertEquals('{c} {A()} Hello {A} {b}', $matches->getText());
	}

	function testLegacyReplacementWithSpace()
	{
		$string = '{c} {A()} {B() /} {A} {b}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$orig = $this->toArray($matches);

		$orig[2]->replaceWith('Hello');

		$this->assertEquals('{c} {A()} Hello {A} {b}', $matches->getText());
	}

	function testLargerReplacement()
	{
		$string = '{c} {A()} {b} {A} {b}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$orig = $this->toArray($matches);

		$orig[1]->replaceWith('Hello');

		$this->assertEquals('{c} Hello {b}', $matches->getText());
	}

	function testMatchReplacementChangesOffsets()
	{
		$matches = $this->doMatch('{c} {A()} {b} {A} {b}', 4);
		$this->assertEquals(4, count($matches));

		$lastMatch = $matches[3];
		$innerMatch = $matches[2];

		// Test initial positions
		$this->assertEquals(0, $matches[0]->getStart());
		$this->assertEquals(3, $matches[0]->getEnd());

		$this->assertEquals(18, $lastMatch->getStart());
		$this->assertEquals(21, $lastMatch->getEnd());

		$matches[1]->replaceWith('Hello');

		// First one does not move
		$this->assertEquals(0, $matches[0]->getStart());
		$this->assertEquals(3, $matches[0]->getEnd());

		// Second one is shifted to the left
		$this->assertEquals(10, $lastMatch->getStart());
		$this->assertEquals(13, $lastMatch->getEnd());

		// One of them is gone
		$this->assertFalse($innerMatch->getStart());
		$this->assertFalse($innerMatch->getEnd());
	}

	function testMatchReplacementDecreasesCount()
	{
		$string = '{c} {A()} {b} {A} {b}';
		$matches = WikiParser_PluginMatcher::match($string);

		$this->assertEquals(4, count($matches));

		$orig = $this->toArray($matches);

		$orig[1]->replaceWith('Hello');

		$this->assertEquals(2, count($matches));
	}

	function testIterationSurvivesReplacement()
	{
		$string = '{c} {A()} {b} {A} {d}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$expected = array('c', 'a', 'd');
		$iteration = 0;
		foreach ($matches as $match) {
			$this->assertEquals($expected[$iteration], $match->getName());

			if ($iteration == 1) {
				$match->replaceWith('Hello');
			}

			++$iteration;
		}

		$this->assertEquals(3, $iteration);
	}

	function testGeneratedPluginsGetMatched()
	{
		$string = '{c} {A()} {b} {A} {d}';
		$matches = WikiParser_PluginMatcher::match($string);
		$this->assertEquals(4, count($matches));

		$expected = array('c', 'a', 'b', 'f', 'd');
		$iteration = 0;
		foreach ($matches as $match) {
			$this->assertEquals($expected[$iteration], $match->getName());

			if ($iteration == 2) {
				$match->replaceWith('{f}');
			}

			++$iteration;
		}
	}

	function testNestingWithoutSpaces()
	{
		$strings = " {A(a=1)}{A(a=2)}{a a=3}{A}{A} ";

		$matches = WikiParser_PluginMatcher::match($strings);
		$this->assertEquals(3, count($matches));

		$replacements = array(
			'~np~<div>~/np~{A(a=2)}{a a=3}{A}~np~</div>~/np~',
			'~np~<div>~/np~{a a=3}~np~</div>~/np~',
			'~np~<div>~/np~3~np~</div>~/np~',
		);
		foreach ($matches as $match) {
			$match->replaceWith(array_shift($replacements));
		}

		$this->assertEquals(0, count($matches));
	}

	function testIntegrityPreservedOnReplacement()
	{
		$strings = '{A(a=1)}{a a=2}{A(a=3)/}{A}';

		$matches = WikiParser_PluginMatcher::match($strings);

		$replacements = array(
			'{a a=2}{A(a=3)/}{A(a=4)}Hello World{A}',
			'0',
			'1',
			'2',
		);
		$obtained = array();
		foreach ($matches as $match) {
			$obtained[] = $match->getArguments() . $match->getBody();
			$match->replaceWith(array_shift($replacements));
		}

		$this->assertEquals('012', $matches->getText());
		$this->assertEquals(
			array(
				'a=1{a a=2}{A(a=3)/}',
				'a=2',
				'a=3',
				'a=4Hello World',
			),
			$obtained
		);
	}

	function testWithPrettyVariablePrior()
	{
		$strings = '{$f_13}{foo hello=world}';

		$matches = WikiParser_PluginMatcher::match($strings);
		foreach ($matches as $m) {
			$m->replaceWith('X');
		}

		$this->assertEquals('{$f_13}X', $matches->getText());
	}
/*
	// TODO : Replacement re-find existing
	// TODO : Replacement original vs generated
	*/
}
