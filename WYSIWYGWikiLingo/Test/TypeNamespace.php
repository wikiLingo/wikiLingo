<?php
namespace WYSIWYGWikiLingo\Test;

use WikiLingo;
use WYSIWYGWikiLingo;
use WikiLingoWYSIWYG;
use Testify\Testify;

class TypeNamespace extends WikiLingo\Test\TypeNamespace
{
	public $files;
	public $parser;
	public $preParser;

	public function setParser()
	{
		$this->preParser = new WikiLingoWYSIWYG\Parser();
		$this->parser = new WYSIWYGWikiLingo\Parser();
	}

    public function getDirectory()
    {
        return dirname(__FILE__);
    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }

	public function run(Testify &$testify)
	{
		foreach($this->classes as $class) {
			$fullyQualifiedClass = $class;
			$test = new $fullyQualifiedClass($this->preParser);

			//the idea here is to take WYSIWYGWikiLingo Markup, and to turn it into WikiLingo Markup, so source comes from the WikiLingoWYSIWYG Parser
			$actual = $this->parser->parse($test->source);

            $test->source = preg_replace('/\r/', "", $test->source);
            $actual = preg_replace('/\r/', "", $actual);
            $test->expected = preg_replace('/\r/', "", $test->expected);
            
			$message = (new WikiLingo\Test\VisualFeedbackTable($class))
				->setSource($test->source)
				->setExpected($test->expected)
				->setActual($actual)
				->render();

			$testify->assertEquals($actual, $test->expected, $message);
		}
	}
}