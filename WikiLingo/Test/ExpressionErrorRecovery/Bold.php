<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Bold extends Base
{
	public function __construct()
	{
		$this->expected = $this->source = "__foo ";
	}
}
