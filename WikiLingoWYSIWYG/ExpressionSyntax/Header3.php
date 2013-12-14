<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header3 extends Base
{
    public $label = 'Header 3';
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu header3';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return "\n!!!expression";
    }
}
