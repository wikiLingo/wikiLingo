<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header1 extends Base
{
    public $label = 'Header 1';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header1';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return "\n!expression";
    }
}
