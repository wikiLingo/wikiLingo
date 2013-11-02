<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class TableWithBreakJustAfter extends Base
{
	public function __construct()
	{

		$this->source =
			"\n" .
			"||test|test\n" .
			"test|test||\n";

		$this->expected =
			"<br/>\n" .
			"<table>" .
				"<tr>" .
					"<td>test</td>" .
					"<td>test</td>" .
				"</tr>" .
				"<tr>" .
					"<td>test</td>" .
					"<td>test</td>" .
				"</tr>" .
			"</table>" .
			"<br/>\n";
	}
}
