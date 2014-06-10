<?php
namespace WYSIWYGWikiLingo\Expression;

use WYSIWYGWikiLingo;
use WikiLingo;

/**
 * Class InlineElement
 * @package WYSIWYGWikiLingo\Expression
 */
class InlineElement extends Base
{
    public $name = '';
    public $isElement = false;
    public $styles = array();
    public $_styles = array();
    public $classes = array();
    public $_classes = array();
    public $isParent = false;

    /**
     * @var WikiLingo\Utilities\Parameters\Parser
     */
    public static $parameterParser = null;

    /**
     * @param WYSIWYGWikiLingo\Parsed $parsed
     */
    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        if (self::$parameterParser === null)
        {
            Element::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();
        }

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

            if (strtolower($this->parameter('data-parent')) == 'true') {
                $this->isParent = true;
            }
            if (strtolower($this->parameter('data-element')) == 'true') {
                $this->isElement = true;
            } else if (strtolower($this->parameter('data-helper')) == 'true') {
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
        } else {
            $this->isStatic = true;
        }
    }

    /**
     * @param $parameter
     * @return string
     */
    public function parameter($parameter)
    {
        if (isset($this->parameters[$parameter])) {
            return $this->parameters[$parameter];
        }

        return '';
    }

    /**
     * @param $class
     * @return bool
     */
    public function hasClass($class)
    {
        if (isset($this->_classes[$class])) {
            return true;
        }

        return false;
    }

    /**
     * @param $style
     * @return string
     */
    public function style($style)
    {
        if (isset($this->styles[$style])) {
            return $this->styles[$style];
        }

        return '';
    }
}