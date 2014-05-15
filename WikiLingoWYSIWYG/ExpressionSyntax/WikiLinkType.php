<?php

namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class WikiLinkType extends Base
{
    public $label = 'Wiki Link Type';
    public $icon = ' ';
    public $iconClass = 'icon-link';
    public $group = 'link';

	public function __construct()
	{
		$this->attribute = new WikiLingoWYSIWYG\ExpressionAttribute('Type', 'wiki', null, 'data-wiki-link-type');
	}

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '(attribute(expression))';
    }
}