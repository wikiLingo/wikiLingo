<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Box extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-checkbox-unchecked';
    public $group = 'misc';

    public function example()
    {
        return '^expression^';
    }
}