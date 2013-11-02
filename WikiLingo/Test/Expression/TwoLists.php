<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

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
            '<ol class="wl-parent">' .
                '<li class="orderedListItem">Item 1</li>' .
                '<li class="orderedListItem">Item 2</li>' .
                '<li class="orderedListItem">Item 3</li>' .
            "</ol>" .
            "<br/>\n" .
            '<ol class="wl-parent">' .
                '<li class="orderedListItem">Item 1</li>' .
                '<li class="orderedListItem">Item 2</li>' .
                '<li class="orderedListItem">Item 3</li>' .
            '</ol>' .
            "<br/>\n";

	}
}
