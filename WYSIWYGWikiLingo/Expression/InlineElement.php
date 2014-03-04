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
    public $isElement = true;

    public static $parameterParser;

    /**
     * @param WYSIWYGWikiLingo\Parsed $parsed
     */
    function __construct(WYSIWYGWikiLingo\Parsed &$parsed)
    {
        parent::__construct($parsed);

        $pos = strpos($parsed->text, ' ');
        if ($pos !== false) {
            $parametersString = trim(substr($parsed->text, $pos, -1));
            $this->parameters = self::$parameterParser->parse($parametersString);

            if (strtolower($this->parameter("data-element")) == "true") {
                $this->isElement = true;
            } else if (strtolower($this->parameter('data-helper')) == "true") {
                $this->isHelper = true;
            } else {
                $this->isStatic = true;
            }
        }
    }
}


InlineElement::$parameterParser = new WikiLingo\Utilities\Parameters\Parser();