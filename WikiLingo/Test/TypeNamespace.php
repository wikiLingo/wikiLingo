<?php
namespace WikiLingo\Test;

use WikiLingo;
use Testify\Testify;

class TypeNamespace
{
	public $typeNamespace;
	public $directory;
	public $files;
	public $parser;

    public function __construct($typeNamespace)
    {
	    $this->typeNamespace = $typeNamespace;
	    $this->directory = dirname(__FILE__) . '/' . $typeNamespace;
	    $this->files = scandir($this->directory);
	    $this->setParser();
    }

	public function setParser()
	{
		$this->parser = new WikiLingo\Parser();
	}

	public function run(Testify &$testify)
	{
		foreach($this->files as $file) {
			if($file === '.' || $file === '..') {continue;}
			$class = "WikiLingo\\Test\\" . $this->typeNamespace . "\\" . substr($file, 0, -4);
			$test = new $class();
			$actual = $this->parser->parse($test->source);
			$message = "Expecting:<br /><code>" . htmlentities($test->expected) . "</code>" .
				"<br /><br />" .
				"Got:<br /><code>" . htmlentities($actual) . "</code>" .
                "<br /><br />" .
                "Syntax:<br /><pre>" . $test->source . "</pre>";


			$testify->assertEquals($actual, $test->expected, $message);
		}
	}
}