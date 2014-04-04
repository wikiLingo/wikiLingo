<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class All extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = $this->source = "__^===~~''--||-=::[foo ";
	}
}
