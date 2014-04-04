<?php
namespace WikiLingo\Test\ExpressionErrorRecovery;

use WikiLingo\Test\Base;

class Strike extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = $this->source = "--foo ";
	}
}
