<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;

class Header5 extends Base
{
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu';

    public function example()
    {
        return "\n!!!!!expression";
    }
}
