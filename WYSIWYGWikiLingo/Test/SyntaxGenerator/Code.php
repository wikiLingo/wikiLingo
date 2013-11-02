<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Code extends Base
{
	public function __construct()
	{

		$this->source = "-+foo+-";

		$this->expected = "<pre>foo</pre>";

	}
}
