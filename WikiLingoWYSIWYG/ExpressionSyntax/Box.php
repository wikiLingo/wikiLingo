<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Box extends Base
{
    public $label = 'Box';
    public $icon = ' ';
    public $iconClass = 'icon-checkbox-unchecked';
    public $group = 'misc';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '^expression^';
    }
}