<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Italic extends Base
{
	public function __construct()
	{

		$this->source = "''foo''";

		$this->expected = "<i>foo</i>";

	}
}
