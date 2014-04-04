<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Expression\BlockType\Header;

class SimpleHeaders extends Base
{
	public function __construct(&$parser)
	{
		Header::$ids = array();

		$this->source =
			"! foo\n" .
			"!!foo\n" .
			"!! foo";

		$this->expected =
			"<h1 id='+foo'><span class='whitespace'> </span>foo</h1>" .
			"<h2 id='foo'>foo</h2>" .
			"<h2 id='+foo1'><span class='whitespace'> </span>foo</h2>";
	}
}