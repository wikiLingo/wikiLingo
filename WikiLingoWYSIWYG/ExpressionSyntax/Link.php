<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;

class Link extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

    public function example()
    {
        return '[location|expression]';
    }
}
