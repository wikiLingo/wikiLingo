<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class NoParse extends Base
{
    public $label = 'No Parse';
    public $icon = '';
    public $iconClass = 'icon-blocked';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '~np~expression~/np~';
    }
}