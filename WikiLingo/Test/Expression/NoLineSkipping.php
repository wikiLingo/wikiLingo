<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Expression;
use WikiLingo\Parser;
use WikiLingo\Test\Base;

class NoLineSkipping extends Base
{
	public function __construct()
	{
		Expression\Plugin::$indexes = array();

		$this->source =
			"{DIV()}\n" .
			"{DIV()}\n" .
			"{DIV()}\n" .
			"{DIV()}\n" .
			"{DIV}{DIV}{DIV}{DIV}\n" .
			";foo:foo definition\n" .
			";foo2:foo2 definition\n" .
			"[[__bold__]\n" .
			"Test" .
			"''Test Italics''\n";

		$this->expected =
            "<div id='div4'>" . '<br class="hidden"/>' .
                "<div id='div3'>" . '<br class="hidden"/>' .
                    "<div id='div2'>" . '<br class="hidden"/>' .
                        "<div id='div1'>" . '<br class="hidden"/>' .
                        "</div>" .
                    "</div>" .
                "</div>" .
            "</div>" .
            "<dl>" .
                "<dt>foo</dt>" .
                "<dd>foo definition</dd>" .
                "<dt>foo2</dt>" .
                "<dd>foo2 definition</dd>" .
            "</dl>" .
            "<br/>" .
            "<a href='[__bold__'>[__bold__</a><br/>" .
            "Test<i>Test Italics</i><br/>";

	}
}
