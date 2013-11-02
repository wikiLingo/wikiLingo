<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Comment extends Base
{
	public function __construct()
	{

		$this->source = "~tc~This is a test comment __this won't be parsed__~/tc~";

		$this->expected = "";

	}
}
