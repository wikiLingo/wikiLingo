<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Color extends Base
{
	public function __construct()
	{

		$this->source =
            "~~red:text~~ \n" .
            "~~#ff00ff:text~~";

		$this->expected =
            '<span style=\'color:red;\'>text</span> <br/>' . "\n" .
            '<span style=\'color:#ff00ff;\'>text</span>';

	}
}
