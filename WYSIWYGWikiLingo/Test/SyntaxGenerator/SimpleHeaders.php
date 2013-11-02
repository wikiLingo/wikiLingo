<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class SimpleHeaders extends Base
{
	public function __construct()
	{
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