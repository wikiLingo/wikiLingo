<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class DescriptionList extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-list2';
    public $group = 'misc';

	public function example()
    {
        return "\n;term:definition";
    }
}