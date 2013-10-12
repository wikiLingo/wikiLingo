<?php
namespace WikiLingo\Expression;

class Comment extends Base
{
	public function render(&$parser)
	{
		if (isset($parser->wysiwyg)) {
			return $this->parsed->text;
		}
		return '';
	}
}