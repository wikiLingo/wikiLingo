<?php

namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class SpecialChar
 * @package WikiLingo\Expression
 */
class SpecialChar extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$parser)
	{
		$element = $parser->element(__CLASS__, 'span');
		$element->staticChildren[] = htmlspecialchars($this->parsed->text);
		return $element->render();
	}
}