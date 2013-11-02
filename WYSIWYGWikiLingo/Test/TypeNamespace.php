<?php
namespace WYSIWYGWikiLingo\Test;

use WikiLingo;
use WYSIWYGWikiLingo;
use WikiLingoWYSIWYG;
use Testify\Testify;

class TypeNamespace
{
	public $typeNamespace;
	public $directory;
	public $files;
	public $parser;
	public $preParser;

    public function __construct($typeNamespace)
    {
	    $this->typeNamespace = $typeNamespace;
	    $this->directory = dirname(__FILE__) . '/' . $typeNamespace;
	    $this->files = scandir($this->directory);
	    $this->setParser();
    }

	public function setParser()
	{
		$this->preParser = new WikiLingoWYSIWYG\Parser();
		$this->parser = new WYSIWYGWikiLingo\Parser();
	}

	public function run(Testify &$testify)
	{
		foreach($this->files as $file) {
			if($file === '.' || $file === '..') {continue;}

			$class = substr($file, 0, -4);
			$fullyQualifiedClass = "WYSIWYGWikiLingo\\Test\\" . $this->typeNamespace . "\\" . $class;
			$test = new $fullyQualifiedClass($this->parser);
			//the idea here is to take WYSIWYGWikiLingo Markup, and to turn it into WikiLingo Markup, so source comes from the WikiLingoWYSIWYG Parser
			$source = $this->preParser->parse($test->source);
			$expected = $test->source;
			$actual = $this->parser->parse($source);
			$message = "Testing: " . substr($file, 0, -4) . "<br />" .
                "Expecting:<br /><pre><code>" . htmlentities($expected) . "</code></pre>" .
				"<br /><br />" .
				"Got:<br /><pre><code>" . htmlentities($actual) . "</code></pre>" .
                "<br /><br />" .
                "Syntax:<br /><pre><code>" . htmlentities($test->source) . "<code></pre>";


			$testify->assertEquals($actual, $expected, $message);
		}
	}
}