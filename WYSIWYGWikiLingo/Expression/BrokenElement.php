<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

/**
 * Class BrokenElement
 * @package WYSIWYGWikiLingo\Expression
 */
class BrokenElement extends Base
{
    public $isStatic = true;

    /**
     * @param $renderer
     * @param $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        return $this->parsed->text . $this->renderedChildren;
    }
}