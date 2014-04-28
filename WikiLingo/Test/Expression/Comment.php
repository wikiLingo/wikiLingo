<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Comment extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "/*This is a test comment __this won't be parsed__*/";

		$this->expected = "";

	}
}
