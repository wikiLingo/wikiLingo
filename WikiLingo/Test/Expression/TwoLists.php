<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TwoLists extends Base
{
	public function __construct()
	{

		$this->source =
			"\n" .
			"#Item 1\n" .
			"#Item 2\n" .
			"#Item 3\n" .
			"\n" .
			"#Item 1\n" .
			"#Item 2\n" .
			"#Item 3\n";

		$this->expected =
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            "</ol>" .
            "<br/>" .
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ol>' .
            "<br/>";

	}
}
