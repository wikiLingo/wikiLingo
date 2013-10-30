<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Expression\Header;

class SimpleHeaders extends Base
{
	public function __construct()
	{
		Header::$ids = array();

		$this->source =
			"! foo\n" .
			"!!foo\n" .
			"!! foo";

		$this->expected =
			"<h1 id='+foo'> foo</h1>" .
			"<h2 id='foo'>foo</h2>" .
			"<h2 id='+foo1'> foo</h2>";
	}
}