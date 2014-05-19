<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Color extends Base
{
    public $label = 'Color';
    public $icon = ' ';
    public $iconClass = 'icon-droplet';
    public $group = 'common';

	public function __construct( $parser )
	{
		$this->attribute = new WikiLingoWYSIWYG\ExpressionAttribute('Color', 'black');

		parent::__construct( $parser );
	}

	public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '~~attribute:expression~~';
    }
}