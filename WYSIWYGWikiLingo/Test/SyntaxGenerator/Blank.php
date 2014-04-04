<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Blank extends Base
{
	public function __construct(&$parser)
	{
		$this->source = "";

		$this->expected = "";

	}
}
