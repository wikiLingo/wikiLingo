<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class WordLink extends Base
{
	public function __construct()
	{
		$this->source = " This Not ";

		$this->expected = " <a href='http://This.com'>This</a> Not ";

	}
}
