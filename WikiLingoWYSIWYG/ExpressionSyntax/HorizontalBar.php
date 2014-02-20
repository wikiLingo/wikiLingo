<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class HorizontalBar extends Base
{
    public $label = 'Horizontal Bar';
    public $icon = '';
    public $iconClass = 'icon-minus';
    public $group = 'misc';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '---';
    }
}