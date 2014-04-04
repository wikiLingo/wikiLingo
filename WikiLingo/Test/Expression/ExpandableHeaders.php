<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Expression\BlockType\Header;

class ExpandableHeaders extends Base
{
	public function __construct(&$parser)
	{
		Header::$ids = array();

		$this->source =
			"!+foo\n" .
				"heading text section\n" .
			"!-foo\n" .
				"heading text section";

		$this->expected =
			"<h1 id='foo'>foo<a href='#'>[+]</a></h1>" .
				"heading text section" .
			"<h1 id='foo1'>foo<a href='#'>[-]</a></h1>" .
				"heading text section";

	}
}
