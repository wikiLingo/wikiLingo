<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Header3 extends Base
{
    public $group = 'header';
    public $icon = '';
    public $iconClass = 'icon-menu';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return "\n!!!expression";
    }
}
