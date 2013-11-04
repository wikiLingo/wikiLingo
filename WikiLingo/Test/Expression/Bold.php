<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Utilities\Html;

class Bold extends Base
{
	public function __construct()
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
