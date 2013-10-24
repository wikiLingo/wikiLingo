<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

class BrokenElement extends Base
{
    public $isStatic = true;

    public function render(&$parser)
    {
        return $this->parsed->text . $this->renderedChildren;
    }
}