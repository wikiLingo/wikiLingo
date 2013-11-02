<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

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
                        '<br class="hidden"/>' . "\n" . ' Continuation1' .
                        '<br class="hidden"/>' . "\n" . 'Continuation2' .
                    '</div>' .
                '</li>' .
                '<li> bar</li>' .
            '</ul>';
    }
}