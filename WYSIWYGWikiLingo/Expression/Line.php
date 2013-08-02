<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

class Line extends WikiLingo\Expression\Line
{
    function render(&$parser)
    {
        return $this->parsed->text;
    }
}