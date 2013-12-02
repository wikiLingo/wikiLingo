<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;
use WikiLingoWYSIWYG;

class Variable extends Base
{
    public $icon = '';
    public $iconClass = 'icon-lab';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
	{
		return '{{expression}}';
	}
}