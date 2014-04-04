<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Bold extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "__foo__ & __ foo  __";

		$this->expected =
			"<strong>foo</strong>" .
			"<span class='whitespace'> </span>& " .
			"<strong>" .
				"<span class='whitespace'> </span>" .
				"foo <span class='whitespace'> </span>" .
			"</strong>";
	}
}
