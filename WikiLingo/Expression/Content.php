<?php
namespace WikiLingo\Expression;
use WikiLingo;

class Content extends Base
{
	public function render(&$parser)
	{
		return $this->parsed->text;
	}
}