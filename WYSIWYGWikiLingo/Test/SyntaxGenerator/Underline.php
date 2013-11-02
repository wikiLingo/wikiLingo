<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Underline extends Base
{
	public function __construct()
	{

		$this->source = "===foo===";

		$this->expected = "<u>foo</u>";

	}
}
