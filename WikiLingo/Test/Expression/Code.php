<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Code extends Base
{
	public function __construct()
	{

		$this->source = "-+foo+-";

		$this->expected = "<textarea class='Code' id='Code0' disabled='true'>foo</textarea>";

	}
}
