<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo\Utilities;
use WikiLingoWYSIWYG;

class Link extends Base
{
    public $label = 'Link';
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

	public function __construct( $parser )
	{
		$this->attribute = new WikiLingoWYSIWYG\ExpressionAttribute('Color', 'black', null, 'attribute|');

		parent::__construct( $parser );
	}

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
	    $this->attribute = new Utilities\Parameter('Location', '');

        return '[attribute|expression]';
    }
}
