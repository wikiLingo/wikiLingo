<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Content extends Base
{
	public function __construct()
	{
		$this->source = "foo";

		$this->expected = "foo";

	}
}
