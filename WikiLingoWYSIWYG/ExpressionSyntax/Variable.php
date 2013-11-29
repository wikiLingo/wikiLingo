<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;

class Variable extends Base
{
    public $icon = '';
    public $iconClass = 'icon-lab';
    public $group = 'misc';

	public function example()
	{
		return '{{expression}}';
	}
}