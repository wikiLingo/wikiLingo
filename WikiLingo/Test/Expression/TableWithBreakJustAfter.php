<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TableWithBreakJustAfter extends Base
{
	public function __construct(&$parser)
	{

		$this->source =
			"\n" .
			"||test|test\n" .
			"test|test||\n";

		$this->expected =
			"<br/>" .
			"<table>" .
				"<tr>" .
					"<td class='table-cell'>test</td>" .
					"<td class='table-cell'>test</td>" .
				"</tr>" .
				"<tr>" .
					"<td class='table-cell'>test</td>" .
					"<td class='table-cell'>test</td>" .
				"</tr>" .
			"</table>";
	}
}
