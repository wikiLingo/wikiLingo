<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Strike extends Base
{
	public function __construct()
	{
		$this->source = "--foo--";

		$this->expected = "<strike>foo</strike>";
	}
}