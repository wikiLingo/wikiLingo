<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;
use WikiLingoWYSIWYG;

class WikiLink extends Base
{
    public $label = 'Wiki Link';
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '((expression))';
    }
}