<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;
use WikiLingoWYSIWYG\ExpressionAttribute;

class Code extends Base
{
    public $label = 'Code';
    public $icon = ' ';
    public $iconClass = 'icon-code';
    public $group = 'misc';

	public function __construct( $parser )
	{
		$this->attribute = new ExpressionAttribute('Mode', 'wikiLingo', 'data-mode', 'attribute ');

		parent::__construct( $parser );
	}

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '-+attribute expression+-';
    }
}