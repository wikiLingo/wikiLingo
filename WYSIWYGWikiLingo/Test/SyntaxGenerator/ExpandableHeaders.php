<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class ExpandableHeaders extends Base
{
	public function __construct()
	{
		$this->source =
			"!+foo\n" .
				"heading text section\n" .
			"!-foo\n" .
				"heading text section";

		$this->expected =
			"<h1 id='foo'>foo<a href='#'>[+]</a></h1>" . "<br/>\n" .
				"heading text section" .
			"<h1 id='foo1'>foo<a href='#'>[-]</a></h1>" . "<br/>\n" .
				"heading text section";

	}
}
