<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

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
            '<ol class="wl-parent">' .
                '<li class="orderedListItem"> foo1' .
                    '<ol class="wl-parent">' .
                        '<li class="orderedListItem"> foo11</li>' .
                        '<li class="orderedListItem">foo12</li>' .
                    '</ol>' .
                '</li>' .
                '<li class="orderedListItem"> bar1</li>' .
            '</ol>';
    }
}