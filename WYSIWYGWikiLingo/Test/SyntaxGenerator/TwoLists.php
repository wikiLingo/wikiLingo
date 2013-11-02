<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class TwoLists extends Base
{
	public function __construct()
	{

		$this->source = "
#Item 1
#Item 2
#Item 3

#Item 1
#Item 2
#Item 3
";

		$this->expected =
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            "</ol>" .
            "<br/>\n" .
            '<ol>' .
                '<li>Item 1</li>' .
                '<li>Item 2</li>' .
                '<li>Item 3</li>' .
            '</ol>' .
            "<br/>\n";

	}
}
