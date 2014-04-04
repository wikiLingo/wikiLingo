<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Content extends Base
{
	public function __construct(&$parser)
	{
		$this->source = "foo";

		$this->expected = "foo";

	}
}
