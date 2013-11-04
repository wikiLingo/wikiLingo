<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TableWithBreakJustAfter extends Base
{
	public function __construct()
	{

		$this->source =
			"\n" .
			"||test|test\n" .
			"test|test||\n";

		$this->expected =
			"<br/>" .
			"<table>" .
				"<tr>" .
					"<td>test</td>" .
					"<td>test</td>" .
				"</tr>" .
				"<tr>" .
					"<td>test</td>" .
					"<td>test</td>" .
				"</tr>" .
			"</table>";
	}
}
