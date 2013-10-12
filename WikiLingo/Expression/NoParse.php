<?php
namespace WikiLingo\Expression;

class NoParse extends Base
{
	public function render(&$parser)
	{
		if (isset($parser->wysiwyg)) {
			$element = $parser->element(__CLASS__, 'span');
			$element->staticChildren[] = $this->renderedChildren;
			return $element->render();
		}
		return $this->renderedChildren;
	}
}