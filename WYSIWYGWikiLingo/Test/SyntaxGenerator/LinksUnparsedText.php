<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class LinksUnparsedText extends Base
{
	public function __construct()
	{

		$this->source = "[((foo))] (([foo]))";

		$this->expected = "<a href='((foo))'>((foo))</a> <a href='[foo]'>[foo]</a>";

	}
}
