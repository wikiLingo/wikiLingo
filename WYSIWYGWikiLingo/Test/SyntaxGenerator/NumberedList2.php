<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class NumberedList2 extends Base
{
    public function __construct()
    {
        $this->source =
            "# foo1\n" .
            "## foo11\n" .
            "##foo12\n" .
            "# bar1";

        $this->expected =
            '<ol>' .
                '<li> foo1' .
                    '<ol>' .
                        '<li> foo11</li>' .
                        '<li>foo12</li>' .
                    '</ol>' .
                '</li>' .
                '<li> bar1</li>' .
            '</ol>';
    }
}