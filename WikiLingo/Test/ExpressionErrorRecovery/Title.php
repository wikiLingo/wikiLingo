<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Title extends Base
{
	public function __construct()
	{
		$this->expected = $this->source = "-=foo ";
	}
}
