<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NumberedList3 extends Base
{
    public function __construct()
    {
        $this->source =
            "# foo{DIV()}\n" .
            " Continuation1\n" .
            "Continuation2{DIV}\n" .
            "# bar";

        $this->expected =
            '<ol class="wl-parent">' .
                '<li class="orderedListItem"> foo' .
                    "<div id='div2'>" .
                        '<br class="hidden"/>' . "\n" . ' Continuation1' .
                        '<br class="hidden"/>' . "\n" . 'Continuation2' .
                    '</div>' .
                '</li>' .
                '<li class="orderedListItem"> bar</li>' .
            '</ol>';
    }
}