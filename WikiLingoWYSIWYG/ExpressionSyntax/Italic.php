<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Italic extends Base
{
    public $icon = '';
    public $iconClass = 'icon-italic';
    public $group = 'common';

    public function example()
    {
        return "''expression''";
    }
}