<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;

class Color extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-droplet';
    public $group = 'common';

	public function example()
    {
        return '~~color:expression~~';
    }
}