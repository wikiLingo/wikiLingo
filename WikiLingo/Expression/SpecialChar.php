<?php

namespace WikiLingo\Expression;

use Types\Type;

class SpecialChar extends Base
{
	public function render(&$parser)
	{
		$element = Type::Element($parser->element(__CLASS__, 'span'));
		$element->staticChildren[] = htmlspecialchars($this->parsed->text);
		return $element->render();
	}
}