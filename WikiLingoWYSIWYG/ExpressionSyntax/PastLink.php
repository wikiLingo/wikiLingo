<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo\Utilities;
use WikiLingoWYSIWYG;

class PastLink extends Base
{
    public $label = 'Past Link';
    public $icon = '';
    public $iconClass = 'icon-past-link';
    public $group = 'misc';

	public function example(WikiLingoWYSIWYG\Parser $parser)
	{
		$this->attribute = new Utilities\Parameter('Clipboard Data', '%20');

		return '@FLP(attribute)expression@)';
	}
}