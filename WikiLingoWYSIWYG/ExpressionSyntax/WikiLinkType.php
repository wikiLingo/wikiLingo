<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use Types\Type;

class WikiLinkType extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

    public function example()
    {
        return '(type(expression))';
    }
}