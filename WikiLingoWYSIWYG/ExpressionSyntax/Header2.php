<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header2 extends Base
{
    public $label = 'Header 2';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header2';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return "\n!!expression";
    }
}
