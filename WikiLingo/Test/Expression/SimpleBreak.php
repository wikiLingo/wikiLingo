<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

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