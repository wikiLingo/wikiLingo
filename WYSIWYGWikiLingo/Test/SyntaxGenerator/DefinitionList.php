<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class DefinitionList extends Base
{
	public function __construct()
	{
		$this->source =
			";foo1:bar1\n" .
			";foo2:bar2";

		$this->expected =
			"<dl>" .
				"<dt>foo1</dt><dd>bar1</dd>" .
				"<dt>foo2</dt><dd>bar2</dd>" .
			"</dl>";

	}
}
