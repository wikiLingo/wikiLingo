<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class UnStrike extends Base
{
	public function __construct()
	{
		$this->source = "-- foo ";

		$this->expected = "-- foo ";
	}
}