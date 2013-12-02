<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class WikiLinkType extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '(type(expression))';
    }
}