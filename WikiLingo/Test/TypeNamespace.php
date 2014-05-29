<?php
namespace WikiLingo\Test;

use WikiLingo;
use Testify\Testify;

/**
 * Class TypeNamespace
 * @package WikiLingo\Test
 */
class TypeNamespace
{
	public $typeNamespace;
    public $classes = array();

    /**
     * @var WikiLingo\Parser
     */
    public $parser;

    /**
     * @param $typeNamespace
     */
    public function __construct($typeNamespace)
    {
	    $this->typeNamespace = $this->getNamespace() . "\\" . $typeNamespace;
	    $directory = $this->getDirectory() . DIRECTORY_SEPARATOR . $typeNamespace;

        if ($files = scandir($directory)) {
            $this->setClassesFromFiles($files);
        } else {
            $this->setClassesFromDeclared();
        }

	    $this->setParser();
    }

    public function getDirectory()
    {
        return dirname(__FILE__);
    }

    public function getNamespace()
    {
        return __NAMESPACE__;
    }
    /**
     *
     */
    public function setParser()
	{
		$this->parser = new WikiLingo\Parser();
	}

    public function setClassesFromFiles($files)
    {
        $namespace = $this->typeNamespace;
        $this->classes = array();
        foreach($files as $file) {
            if($file === '.' || $file === '..') {continue;}
            $name = substr($file, 0, -4);
            $this->classes[] = $class = $namespace . "\\" . $name;
        }
    }

    public function setClassesFromDeclared()
    {
        $namespace = $this->typeNamespace . "\\";
        $this->classes = array();
        $declaredClasses = get_declared_classes();
        foreach($declaredClasses as $name) {
            if(strpos($name, $namespace) === 0) {
                $this->classes[] = $name;
            }
        }
    }

    /**
     * @param Testify $testify
     */
    public function run(Testify &$testify)
	{
		foreach($this->classes as $class) {
			$test = new $class($this->parser);
			$actual = $this->parser->parse($test->source);

			$table = (new VisualFeedbackTable($class))
				->setSource($test->source)
				->setExpected($test->expected)
				->setActual($actual);

            if ($actual === null) {
                $table->setErrors($this->parser->lexerErrors, $this->parser->parserErrors);
            } else if (!empty($test->postParseDelegates)) {
                $test->triggerPostParse($this);
            }

            $this->parser->lexerErrors = array();
            $this->parser->parserErrors = array();

            $message = $table->render();

            $testify->assertEquals($actual, $test->expected, $message);
		}
	}
}