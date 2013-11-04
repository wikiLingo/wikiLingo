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
			$test = new $fullyQualifiedClass($this->preParser);

			//the idea here is to take WYSIWYGWikiLingo Markup, and to turn it into WikiLingo Markup, so source comes from the WikiLingoWYSIWYG Parser
			$actual = $this->parser->parse($test->source);

			$message = (new WikiLingo\Test\VisualFeedbackTable($class))
				->setSource($test->source)
				->setExpected($test->expected)
				->setActual($actual)
				->render();

			$testify->assertEquals($actual, $test->expected, $message);
		}
	}
}