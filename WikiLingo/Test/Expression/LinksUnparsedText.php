<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class LinksUnparsedText extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "[((foo))] (([foo]))";

		$this->expected = "<a href='((foo))'>((foo))</a><span class='whitespace'> </span><a href='[foo]'>[foo]</a>";

	}
}
