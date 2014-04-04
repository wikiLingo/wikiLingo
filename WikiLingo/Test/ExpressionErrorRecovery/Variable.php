<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Variable extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = $this->source = "%foo ";
	}
}
