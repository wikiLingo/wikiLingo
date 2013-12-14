<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;
use WikiLingoWYSIWYG;

class Link extends Base
{
    public $label = 'Link';
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '[location|expression]';
    }
}
