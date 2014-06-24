<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header5 extends Base
{
    public $label = 'Header 5';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header5';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return "\n!!!!!expression";
    }
}
