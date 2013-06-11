<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: PluginArgumentParserTest.php 44444 2013-01-05 21:24:24Z changi67 $

/** 
 * @group unit
 * 
 */

class WikiParser_PluginArgumentParserTest extends TikiTestCase
{
	function testSingleSimpleArgument()
	{
		$out = array('foo' => 'bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=bar'), $out);
		$this->assertEquals($parser->parse('foo=>bar'), $out);
		$this->assertEquals($parser->parse('foo => bar'), $out);
	}

	function testSingleArgumentWithQuotes()
	{
		$out = array('foo' => 'bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo="bar"'), $out);
		$this->assertEquals($parser->parse('foo=>"bar"'), $out);
		$this->assertEquals($parser->parse('foo => "bar"'), $out);
	}

	function testEqualsWithinQuotes()
	{
		$out = array('foo' => 'bar=baz');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo="bar=baz"'), $out);
	}

	function testArgumentChaining()
	{
		$out = array(
			'foo' => 'bar',
			'hello' => 'world',
			'bar' => 'baz',
		);

		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=bar hello=world bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=world,bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=world bar=baz'), $out);
		$this->assertEquals($parser->parse('foo=bar,hello=>world bar=baz'), $out);
	}

	function testQuoteEscape()
	{
		$out = array('foo' => 'bar " test');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=>"bar \" test"'), $out);
	}

	function testUnclosedQuote()
	{
		$out = array('foo' => '" bar');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('foo=>" bar'), $out);
	}

	function testNoArgument()
	{
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse(''), array());
		$this->assertEquals($parser->parse('foo'), array());
	}

	function testInvalidEnd()
	{
		$out = array('a' => 'b');
		$parser = new WikiParser_PluginArgumentParser;
		$this->assertEquals($parser->parse('a=b foo='), $out);
	}
}
