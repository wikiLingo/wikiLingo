<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Color extends Base
{
	public function __construct()
	{

		$this->source =
            "~~red:text~~ \n" .
            "~~#ff00ff:text~~";

		$this->expected =
            "<span style='color:red;'>text</span><span class='whitespace'> </span><br/>" .
            "<span style='color:#ff00ff;'>text</span>";

	}
}
