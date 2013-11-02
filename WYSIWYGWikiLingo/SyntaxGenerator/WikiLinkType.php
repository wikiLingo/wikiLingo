<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

class WikiLinkType extends Base
{
	public function generate()
	{
		$element = Type::WYSIWYGElement($this->expression);
		$type = $element->parameter("data-wiki-link-type");
		$type = preg_replace('/[^#A-Za-z0-9]/', '', $type);
		
		return '(' . $type .'(' . $this->expression->renderedChildren . '))';
	}
}