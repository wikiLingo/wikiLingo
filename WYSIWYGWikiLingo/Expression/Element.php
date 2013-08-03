<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

class Element extends WikiLingo\Expression\Content
{
    public $isClosed = false;
    public $closing;

    public $isHelper = false;
    public $isElement = false;
    public $isStatic = false;

    public static $parameterParser;
    public $parameters = array();
    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos != false) {
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = InlineElement::$parameterParser->parse($parametersString);

            if (isset($this->parameters['class'])) {
                if (strpos($this->parameters['class'], 'wl-element') != false) {
                    $this->isElement = true;
                } else if (strpos($this->parameters['class'], 'wl-helper') != false) {
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
}

Element::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();