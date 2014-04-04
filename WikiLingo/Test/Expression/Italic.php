<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Italic extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "''foo''";

		$this->expected = "<i>foo</i>";

	}
}
