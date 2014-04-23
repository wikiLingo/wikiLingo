<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use Types\Type;
use WikiLingoWYSIWYG;

class PastLink extends Base
{
    public $label = 'Past Link';
    public $icon = '';
    public $iconClass = 'icon-past-link';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser &$parser)
	{
		return '@FLP(%20)expression@)';
	}
}