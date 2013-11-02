<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class WikiUnlink extends Base
{
	public function __construct()
	{

		$this->source = "))foo((";

		$this->expected = "<span>foo</span>";

	}
}
