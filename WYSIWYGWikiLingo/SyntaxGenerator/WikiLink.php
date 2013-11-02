<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

class WikiLink extends Base
{
	public function generate()
	{
		$element = Type::WYSIWYGElement($this->expression);
		$href = $element->parameter("data-href");
		$href = preg_replace('/[^#A-Za-z0-9]/', '', $href);

		if ($href != '') {
			$href .= '|';
		}
		return '((' . $href . $this->expression->renderedChildren . '))';
	}
}