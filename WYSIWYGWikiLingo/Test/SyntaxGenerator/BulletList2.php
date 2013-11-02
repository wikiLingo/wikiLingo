<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class BulletList2 extends Base
{
    public function __construct()
    {
        $this->source =
            "* foo\n" .
            "** foo\n" .
            "**foo\n" .
            "* bar";

        $this->expected =
            '<ul>' .
                '<li> foo' .
                    '<ul>' .
                        '<li> foo</li>' .
                        '<li>foo</li>'.
                    '</ul>' .
                '</li>' .
                '<li> bar</li>' .
            '</ul>';
    }
}