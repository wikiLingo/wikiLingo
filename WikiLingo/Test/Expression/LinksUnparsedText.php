<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class LinksUnparsedText extends Base
{
	public function __construct()
	{

		$this->source = "[((foo))] (([foo]))";

		$this->expected = "<a href='((foo))'>((foo))</a> <a href='[foo]'>[foo]</a>";

	}
}
