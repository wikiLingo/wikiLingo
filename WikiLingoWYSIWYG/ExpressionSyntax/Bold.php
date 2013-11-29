<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Bold extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-bold';
    public $group = 'common';

    public function example()
    {
        return '__expression__';
    }
}