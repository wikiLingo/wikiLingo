<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletList3 extends Base
{
    public function __construct()
    {
        $this->source =
            "* foo{DIV()}\n" .
            " Continuation1\n" .
            "Continuation2{DIV}\n" .
            "* bar";

        $this->expected =
            '<ul>' .
                '<li> foo' .
                    "<div id='div1'>" .
                        '<br class="hidden"/> Continuation1' .
                        '<br class="hidden"/>Continuation2' .
                    '</div>' .
                '</li>' .
                '<li> bar</li>' .
            '</ul>';
    }
}