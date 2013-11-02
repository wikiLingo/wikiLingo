<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class SimpleBreak extends Base
{
	public function __construct()
	{
		$this->source =
			"\n" .
			"text\n";

		$this->expected =
			"<br/>\n" .
			"text<br/>\n";
	}
}