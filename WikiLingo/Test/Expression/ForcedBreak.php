<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class ForcedBreak extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "text%%%text";

		$this->expected = "text<br/>text";

	}
}
