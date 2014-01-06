<?php

namespace WikiLingo\Expression;

use Types\Type;

/**
 * Class SpecialChar
 * @package WikiLingo\Expression
 */
class SpecialChar extends Base
{
    /**
     * @param $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		$element = Type::Element($parser->element(__CLASS__, 'span'));
		$element->staticChildren[] = htmlspecialchars($this->parsed->text);
		return $element->render();
	}
}