<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Headers extends Base
{
	public function __construct()
	{

		$this->source =
			"!Header 1\n" .
			"!!Header 2\n" .
			"!!!Header 3\n" .
			"!!!!Header 4\n" .
			"!!!!!Header 5\n" .
			"!!!!!!Header 6\n" .
			"!!!!!!Header Attempted 7, but got 6\n"
		;

		$this->expected =
			"<h1 id='Header+1'>Header 1</h1>" .
			"<h2 id='Header+2'>Header 2</h2>" .
			"<h3 id='Header+3'>Header 3</h3>" .
			"<h4 id='Header+4'>Header 4</h4>" .
			"<h5 id='Header+5'>Header 5</h5>" .
			"<h6 id='Header+6'>Header 6</h6>" .
			"<h6 id='Header+Attempted+7%2C+but+got+6'>Header Attempted 7, but got 6</h6><br/>\n";

	}
}
