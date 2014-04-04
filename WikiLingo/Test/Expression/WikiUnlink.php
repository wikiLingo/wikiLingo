<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class WikiUnlink extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "))foo((";

		$this->expected = "<span>foo</span>";

	}
}
