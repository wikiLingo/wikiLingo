<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

class Element extends Base
{
    public $isElement = true;

    public $isClosed = false;
    public $closing;

    public static $parameterParser;

    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos != false) {
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = self::$parameterParser->parse($parametersString);

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