<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class PreFormattedText extends Base
{
    public $label = 'Pre Formatted Text';
    public $icon = '';
    public $iconClass = 'icon-code';
    public $group = 'misc';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '~pp~expression~/pp~';
    }
}