<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Bold extends Base
{
	public function __construct()
	{

		$this->source = "__foo__ & __ foo __";

		$this->expected = "<strong>foo</strong> & <strong> foo </strong>";

	}
}
