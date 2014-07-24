<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;
use WikiLingo\Event\Expression\BlockType;

class HeadersWithUnderscore extends Base
{
	public function __construct(&$parser)
	{
		$parser->events->bind(new BlockType\HeaderIdLookup(function($id) {
			return str_replace('-', '_', $id);
		}));

		$this->source =
			"!Header 1\n" .
			"!!Header 2\n" .
			"!!!Header 3\n" .
			"!!!!Header 4\n" .
			"!!!!!Header 5\n" .
			"!!!!!!Header 6\n" .
			"!!!!!!!Header Attempted 7, but got 6\n"
		;

		$this->expected =
			"<h1 id='Header_1'>Header 1</h1>" .
			"<h2 id='Header_2'>Header 2</h2>" .
			"<h3 id='Header_3'>Header 3</h3>" .
			"<h4 id='Header_4'>Header 4</h4>" .
			"<h5 id='Header_5'>Header 5</h5>" .
			"<h6 id='Header_6'>Header 6</h6>" .
			"<h6 id='Header_Attempted_7_but_got_6'>Header Attempted 7, but got 6</h6>";

	}
}
