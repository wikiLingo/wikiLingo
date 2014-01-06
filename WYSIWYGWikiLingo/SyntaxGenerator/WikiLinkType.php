<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class WikiLinkType
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class WikiLinkType extends Base
{
    /**
     * @return string
     */
    public function generate()
	{
		$element = Type::WYSIWYGElement($this->expression);
		$type = $element->parameter("data-wiki-link-type");
		$type = preg_replace('/[^#A-Za-z0-9]/', '', $type);
		
		return '(' . $type .'(' . $this->expression->renderedChildren . '))';
	}
}