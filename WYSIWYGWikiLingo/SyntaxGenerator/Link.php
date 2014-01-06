<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class Link
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Link extends Base
{
    /**
     * @return string
     */
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