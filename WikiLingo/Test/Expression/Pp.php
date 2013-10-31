<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Pp extends Base
{
	public function __construct()
	{

		$this->source = "~pp~foo~/pp~";

		$this->expected = "<pre>foo</pre>";

	}
}
