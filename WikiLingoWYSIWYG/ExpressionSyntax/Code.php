<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Code extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-code';
    public $group = 'misc';

    public function example()
    {
        return '-+expression+-';
    }
}