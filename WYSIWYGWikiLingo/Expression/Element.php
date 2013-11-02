<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

class Element extends Base
{
	public $name = '';
    public $isElement = false;
    public $isClosed = false;
    public $closing;
	public $styles = array();
	private $_styles = array();
	public $classes = array();
	private $_classes = array();
	public $isParent = false;

    public static $parameterParser;

    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos !== false) {
	        $this->name = trim(substr($parsed->text, 1, $pos));
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = self::$parameterParser->parse($parametersString);

	        //populate classes
            if (isset($this->parameters['class'])) {
	            $this->classes = explode(" ", $this->parameters["class"]);

	            foreach($this->classes as $class) {
		            $this->_classes[$class] = true;
	            }
            }

            if ($this->parameter('data-parent')) {
	            $this->isParent = true;
            }
            if ($this->parameter('data-element')) {
                $this->isElement = true;
            } else if ($this->parameter('data-helper')) {
                $this->isHelper = true;
            } else {
                $this->isStatic = true;
            }

	        //populate styles
	        $styles = explode(";", $this->parameter('style'));
	        foreach($styles as $style)
	        {
		        $_style = explode(":", $style);
		        $this->styles[trim(array_shift($_style))] = trim(array_shift($_style));
	        }
        }
    }

    public function setClosing(WikiLingo\Parsed &$parsed)
    {
        $this->isClosed = true;
        $this->closing =& $parsed;
    }

	public function parameter($parameter)
	{
		if (isset($this->parameters[$parameter])) {
			return $this->parameters[$parameter];
		}

		return '';
	}

	public function hasClass($class)
	{
		if (isset($this->_classes[$class])) {
			return true;
		}

		return false;
	}

	public function style($style)
	{
		if (isset($this->styles[$style])) {
			return $this->styles[$style];
		}

		return '';
	}

    public function render(&$parser)
    {
        if ($this->isHelper) {
            return '';
        } else if ($this->isStatic) {
            return $this->parsed->text . $this->renderedChildren . $this->closing->text;
        }

        return parent::render($parser);
    }
}

Element::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();