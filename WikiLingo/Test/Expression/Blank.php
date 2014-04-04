<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Blank extends Base
{
	public function __construct(&$parser)
	{
		$this->source = "";

		$this->expected = "";

	}
}
