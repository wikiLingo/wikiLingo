<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Link extends Base
{
	public function __construct()
	{

		$this->source = "[www.google.com] [www.google.com|Google]";

		$this->expected = "<a href='www.google.com'>www.google.com</a> <a href='www.google.com'>Google</a>";

	}
}
