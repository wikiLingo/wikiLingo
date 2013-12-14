<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class DescriptionList extends Base
{
    public $label = 'Description List';
    public $icon = ' ';
    public $iconClass = 'icon-list2';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return "\n;term:definition";
    }
}