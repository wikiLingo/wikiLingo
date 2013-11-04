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
			$name = substr($file, 0, -4);
			$class = "WikiLingo\\Test\\" . $this->typeNamespace . "\\" . $name;
			$test = new $class($this->parser);
			$actual = $this->parser->parse($test->source);

			$message = (new VisualFeedbackTable($name))
				->setSource($test->source)
				->setExpected($test->expected)
				->setActual($actual)
				->render();

			$testify->assertEquals($actual, $test->expected, $message);
		}
	}
}