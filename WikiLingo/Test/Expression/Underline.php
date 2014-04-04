<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Underline extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "===foo===";

		$this->expected = "<u>foo</u>";

	}
}
