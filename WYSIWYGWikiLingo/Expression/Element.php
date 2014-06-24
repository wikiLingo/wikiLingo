<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;
use WYSIWYGWikiLingo;

/**
 * Class Element
 * @package WYSIWYGWikiLingo\Expression
 */
class Element extends InlineElement
{
    public $isClosed = false;
    public $closing;

    /**
     * @param WikiLingo\Parsed $parsed
     */
    public function setClosing(WikiLingo\Parsed $parsed)
    {
        $this->isClosed = true;
        $this->closing = $parsed;
    }

    /**
     * @param $renderer
     * @param $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        if ($this->isHelper) {
            return '';
        } else if ($this->isStatic) {
            return $this->parsed->text . $this->renderedChildren . $this->closing->text;
        }

        return parent::render($renderer, $parser);
    }
}