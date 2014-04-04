<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletList3 extends Base
{
    public function __construct(&$parser)
    {
        $this->source =
            "* foo{DIV()}\n" .
            " Continuation1\n" .
            "Continuation2{DIV}\n" .
            "* bar";

        $this->expected =
            "<ul>" .
                "<li><span class='whitespace'> </span>foo" .
                    "<div class='Div' id='Div1'>" .
                        "<br/>" .
                        "<span class='whitespace'> </span>Continuation1<br/>" .
                        "Continuation2" .
                    "</div>" .
                "</li>" .
                "<li><span class='whitespace'> </span>bar</li>" .
            "</ul>";
    }
}