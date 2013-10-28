<?php
namespace WikiLingo\Test;

use Testify\Testify;
use WikiLingo;

abstract class Base
{
    public $test;
	static $verbose = false;
	public $called;
	public $parser;
	public $syntaxSets = array();

    public abstract function provider();

    public function __construct(Testify $test) {
        $this->parser = new WikiLingo\Parser();
        $this->called = 0;
        $this->test = $test;
    }

	public function testOutput()
	{
        $this->provider();
		$syntaxSets = (isset($this->parentProvider) ? $this->parentProvider->syntaxSets : $this->syntaxSets);
		foreach ($syntaxSets as $syntaxName => $syntax) {
			if (isset($syntax[0])) {
				$parsed = $this->parser->parse($syntax[0]);
			} else {
				$customHandled = $this->$syntaxName();
				$parsed = $customHandled['parsed'];
				$syntax = $customHandled['syntax'];
			}

			/*if (self::$verbose == true) {
				echo $syntaxName . ":\n";
				echo '"' . $parsed . '"' . "\n\n\n\n";
			}*/

			$this->called++;

			$this->assertSyntaxEquals($syntax[1], $parsed, $syntaxName, $syntax[0]);
		}
	}

	public function assertSyntaxEquals($expected, $actual, $syntaxName, $syntax)
	{
		/*if ($expected != $actual) {
			echo "\n\n\n\nFailure on: $syntaxName\n";
			echo "Syntax: '$syntax'\n";
			echo "Output: '$actual'\n";
		}*/

		$this->test->assertEquals($expected, $actual);
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