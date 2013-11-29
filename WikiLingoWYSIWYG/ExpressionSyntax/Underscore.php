<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Underscore extends Base
{
    public $icon = '';
    public $iconClass = 'icon-underline';
    public $group = 'common';

    public function example()
    {
        return '===expression===';
    }
}