<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Italic extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = $this->source = "''foo ";
	}
}
