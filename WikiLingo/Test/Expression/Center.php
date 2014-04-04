<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Center extends Base
{
	public function __construct(&$parser)
	{

		$this->source =
			"::foo:: :: foo 2 ::";

		$this->expected =
			"<div class='center'>foo</div>" .
			"<span class='whitespace'> </span>" .
			"<div class='center'>" .
				"<span class='whitespace'> </span>foo 2 " .
			"</div>";

	}
}
