<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Expression;
use WikiLingo\Test\Base;

class NumberedList3 extends Base
{
    public function __construct()
    {
	    Expression\Plugin::$indexes = array();

        $this->source =
            "# foo{DIV()}\n" .
            " Continuation1\n" .
            "Continuation2{DIV}\n" .
            "# bar";

        $this->expected =
            '<ol>' .
                "<li><span class='whitespace'> </span>foo" .
                    "<div id='div1'>" .
                        "<br class='hidden'/>" . "<span class='whitespace'> </span>Continuation1" .
                        "<br class='hidden'/>" . 'Continuation2' .
                    '</div>' .
                '</li>' .
                "<li><span class='whitespace'> </span>bar</li>" .
            '</ol>';
    }
}