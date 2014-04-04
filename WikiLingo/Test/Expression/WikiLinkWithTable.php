<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class WikiLinkWithTable extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "((FakePage|||table|table|table||))";

		$this->expected = "<a href='FakePage'>||table|table|table||</a>";

	}
}
