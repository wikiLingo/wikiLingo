<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class PreFormattedText extends Base
{
    public $icon = '';
    public $iconClass = 'icon-code';
    public $group = 'misc';

    public function example()
    {
        return '~pp~expression~/pp~';
    }
}