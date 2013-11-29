<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class NoParse extends Base
{
    public $icon = '';
    public $iconClass = 'icon-blocked';
    public $group = 'misc';

	public function example()
    {
        return '~np~expression~/np~';
    }
}