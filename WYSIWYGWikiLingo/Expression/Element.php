<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

class Element extends Base
{
    public $isElement = true;

    public $isClosed = false;
    public $closing;
	public $class = array();
	private $classes = array();
	public $isParent = false;

    public static $parameterParser;

    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos !== false) {
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = self::$parameterParser->parse($parametersString);

            if (isset($this->parameters['class'])) {
	            $this->class = explode(" ", $this->parameters["class"]);

	            foreach($this->class as $class) {
		            $this->classes[$class] = true;
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
        }
    }

    public function setClosing(WikiLingo\Parsed &$parsed)
    {
        $this->isClosed = true;
        $this->closing =& $parsed;
    }

	public function hasClass($class)
	{
		if (isset($this->classes[$class])) {
			return true;
		}

		return false;
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