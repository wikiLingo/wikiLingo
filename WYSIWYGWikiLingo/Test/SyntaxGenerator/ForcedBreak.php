<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class ForcedBreak extends Base
{
	public function __construct()
	{

		$this->source = "text%%%text";

		$this->expected = "text<br/>text";

	}
}
