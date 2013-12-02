<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use WikiLingoWYSIWYG;

class Color extends Base
{
    public $icon = ' ';
    public $iconClass = 'icon-droplet';
    public $group = 'common';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '~~color:expression~~';
    }
}