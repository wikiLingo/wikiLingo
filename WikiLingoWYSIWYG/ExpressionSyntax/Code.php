<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Code extends Base
{
    public $label = 'Code';
    public $icon = ' ';
    public $iconClass = 'icon-code';
    public $group = 'misc';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '-+expression+-';
    }
}