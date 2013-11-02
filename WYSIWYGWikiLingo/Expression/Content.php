<?php
namespace WYSIWYGWikiLingo\Expression;

use WikiLingo;

class Content extends Base
{
    public $isStatic = true;

	public function render(&$parser)
	{
		if ($this->isHelper) {
			return '';
		} else if ($this->isStatic) {
			return $this->parsed->text . $this->renderedChildren . (isset($this->closing->text) ? $this->closing->text : '');
		}

		return parent::render($parser);
	}
}