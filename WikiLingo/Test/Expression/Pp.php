<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Pp extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "-/foo/-";

		$this->expected = "<pre>foo</pre>";

	}
}
