<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletList2 extends Base
{
    public function __construct(&$parser)
    {
        $this->source =
            "* foo\n" .
            "** foo\n" .
            "**foo\n" .
            "* bar";

        $this->expected =
            "<ul>" .
                "<li><span class='whitespace'> </span>foo" .
                    "<ul>" .
                        "<li><span class='whitespace'> </span>foo</li>" .
                        "<li>foo</li>" .
                    "</ul>" .
                "</li>" .
                "<li><span class='whitespace'> </span>bar</li>" .
            "</ul>";
    }
}