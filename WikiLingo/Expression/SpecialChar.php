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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
	{
		$element = $renderer->element(__CLASS__, 'span');
		$element->staticChildren[] = htmlspecialchars($this->parsed->text);
		return $element->render();
	}
}