<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;

class Center extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-paragraph-center';
    public $group = 'common';

    public function example()
    {
        return '::expression::';
    }
}