<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class Comment extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-bubble';
    public $group = 'misc';

	public function example()
    {
        return '~tc~expression~/tc~';
    }
}