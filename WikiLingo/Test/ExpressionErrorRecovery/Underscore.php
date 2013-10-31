<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Underscore extends Base
{
	public function __construct()
	{
		$this->expected = $this->source = "::foo ";
	}
}
