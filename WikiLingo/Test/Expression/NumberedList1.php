<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NumberedList1 extends Base
{
    public function __construct()
    {
        $this->source =
            "# foo\n" .
            "# bar";

        $this->expected =
            '<ol class="wl-parent">' .
                '<li class="orderedListItem"> foo</li>' .
                '<li class="orderedListItem"> bar</li>' .
            '</ol>';
    }
}