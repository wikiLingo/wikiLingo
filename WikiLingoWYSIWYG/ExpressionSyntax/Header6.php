<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header6 extends Base
{
    public $label = 'Header 6';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header6';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return "\n!!!!!!expression";
    }
}
