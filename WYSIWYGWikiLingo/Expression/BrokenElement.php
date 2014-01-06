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
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
    {
        return $this->parsed->text . $this->renderedChildren;
    }
}