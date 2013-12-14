<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header4 extends Base
{
    public $label = 'Header 4';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header4';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return "\n!!!!expression";
    }
}
