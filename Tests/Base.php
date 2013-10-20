<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: Abstract.php 47914 2013-10-07 20:19:51Z alain_desilets $
namespace Tests;
include_once("../index.php");

use WikiLingo;

class Base
{
	static $verbose = false;
	public $called;
	public $parser;
	public $syntaxSets = array();

	function setUp()
	{
		$this->parser = new WikiLingo\Parser();
		$this->called = 0;
	}

	public function testOutput()
	{
		$syntaxSets = (isset($this->parentProvider) ? $this->parentProvider->syntaxSets : $this->syntaxSets);
		foreach ($syntaxSets as $syntaxName => $syntax) {
			if (isset($syntax[0])) {
				$parsed = $this->parser->parse($syntax[0]);
			} else {
				$customHandled = $this->$syntaxName();
				$parsed = $customHandled['parsed'];
				$syntax = $customHandled['syntax'];
			}

			if (self::$verbose == true) {
				echo $syntaxName . ":\n";
				echo '"' . $parsed . '"' . "\n\n\n\n";
			}

			$this->called++;

			$this->assertSyntaxEquals($syntax[1], $parsed, $syntaxName, $syntax[0]);
		}
	}

	static function assertSyntaxEquals($expected, $actual, $syntaxName, $syntax)
	{
		if ($expected != $actual) {
			echo "\n\n\n\nFailure on: $syntaxName\n";
			echo "Syntax: '$syntax'\n";
			echo "Output: '$actual'\n";
		}

		parent::assertEquals($expected, $actual);
	}

	public function tryRemoveIdsFromHtmlList(&$parsed)
	{
		$parsed = preg_replace('/id="id[0-9]+"/', 'id=""', $parsed);
		$parsed = preg_replace("/id='id[0-9]+'/", "id=''", $parsed);
	}

	public function tryRemoveFingerprintId($type, &$parsed)
	{
		$parsed = preg_replace('/id="' . $type . '(.)+?"/', 'id=""', $parsed);
	}
}