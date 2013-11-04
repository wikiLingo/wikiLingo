<?php
namespace WikiLingo\Expression;

class Comment extends Base
{
	public $allowLineAfter = false;

	public function render(&$parser)
	{
		if (isset($parser->wysiwyg)) {
			$element = $parser->element(__CLASS__, 'span');
			$element->staticChildren[] = $this->renderedChildren;
			$element->classes[] = 'comment';
			return $element->render();
		}
		return '';
	}
}