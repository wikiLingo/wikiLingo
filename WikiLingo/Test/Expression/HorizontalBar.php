<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class HorizontalBar extends Base
{
	public function __construct(&$parser)
	{

		$this->source = " --- ";

		$this->expected =
			"<span class='whitespace'> </span><hr/><span class='whitespace'> </span>";
	}
}
