<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Expression;
use WikiLingo\Test\Base;

class NumberedList3 extends Base
{
    public function __construct(WikiLingo\Parser &$parser)
    {
	    Expression\Plugin::$indexes = array();

        $this->source =
            "# foo{DIV()}\n" .
            " Continuation1\n" .
            "Continuation2{DIV}\n" .
            "# bar";

        $this->expected =
            '<ol>' .
                '<li> foo' .
                    "<div id='div1'>" .
                        '<br class="hidden"/>' . "\n" . ' Continuation1' .
                        '<br class="hidden"/>' . "\n" . 'Continuation2' .
                    '</div>' .
                '</li>' .
                '<li> bar</li>' .
            '</ol>';
    }
}