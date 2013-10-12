<?php
namespace WikiLingo\Expression;

class DoubleDash extends Base
{
	public function render(&$parser)
	{
		return $this->parsed->text;
	}
}