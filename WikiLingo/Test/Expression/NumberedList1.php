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
            '<ol>' .
                '<li> foo</li>' .
                '<li> bar</li>' .
            '</ol>';
    }
}