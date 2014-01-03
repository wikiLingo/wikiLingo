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
            "<div class='div' id='div4'>" . "<br/>" .
                "<div class='div' id='div3'>" . "<br/>" .
                    "<div class='div' id='div2'>" . "<br/>" .
                        "<div class='div' id='div1'>" . "<br/>" .
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
            "<a href='[__bold__'>[__bold__</a><br/>" .
            "Test<i>Test Italics</i><br/>";

	}
}
