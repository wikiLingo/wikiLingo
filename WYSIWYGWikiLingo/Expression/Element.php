<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

class Element extends Base
{
    public $isElement = true;

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
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = self::$parameterParser->parse($parametersString);

	        //populate classes
            if (isset($this->parameters['class'])) {
	            $this->classes = explode(" ", $this->parameters["class"]);

	            foreach($this->classes as $class) {
		            $this->_classes[$class] = true;
	            }

	            if ($this->hasClass('wl-parent')) {
		            $this->isParent = true;
	            }
                if ($this->hasClass('wl-element')) {
                    $this->isElement = true;
                } else if ($this->hasClass('wl-helper')) {
                    $this->isHelper = true;
                } else {
                    $this->isStatic = true;
                }
            }

	        //populate styles
	        if (isset($this->parameters['style'])) {
		        $styles = explode(";", $this->parameters['style']);
		        foreach($styles as $style)
		        {
			        $_style = explode(":", $style);
			        $this->styles[trim(array_shift($_style))] = trim(array_shift($_style));
		        }
	        }
        }
    }

    public function setClosing(WikiLingo\Parsed &$parsed)
    {
        $this->isClosed = true;
        $this->closing =& $parsed;
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
        }
        return parent::render($parser);
    }
}

Element::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();