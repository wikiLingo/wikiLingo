<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Code extends Base
{
	public function __construct()
	{

		$this->source = "-+foo+-";

		$this->expected = "<pre>foo</pre>";

	}
}
