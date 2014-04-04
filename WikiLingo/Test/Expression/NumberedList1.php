<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NumberedList1 extends Base
{
    public function __construct(&$parser)
    {
        $this->source =
            "# foo\n" .
            "# bar";

        $this->expected =
            '<ol>' .
                "<li><span class='whitespace'> </span>foo</li>" .
                "<li><span class='whitespace'> </span>bar</li>" .
            '</ol>';
    }
}