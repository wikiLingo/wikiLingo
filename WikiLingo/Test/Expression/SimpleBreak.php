<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class SimpleBreak extends Base
{
	public function __construct(&$parser)
	{
		$this->source =
			"\n" .
			"text\n";

		$this->expected =
			"<br/>" .
			"text<br/>";
	}
}