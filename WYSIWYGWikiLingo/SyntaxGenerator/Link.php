<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

class Link extends Base
{
	public function generate()
	{
		$element = Type::WYSIWYGElement($this->expression);
		$href = $element->parameter("data-href");

		if ($href != "") {
			$href .= "|";
		}
		return '[' . $href . $this->expression->renderedChildren . ']';
	}
}