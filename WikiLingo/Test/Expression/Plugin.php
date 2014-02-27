<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class Plugin extends Base
{
	public function __construct()
	{

		WikiLingo\Expression\Plugin::$indexes['Div'] = null;

		$this->source = "{div test=`test`}{DIV()}{DIV} {DIV()}Test{DIV}";

		$this->expected = "<div class='Div' id='Div1'></div>" .
            "<div class='Div' id='Div2'></div>" .
            "<span class='whitespace'> </span>" .
            "<div class='Div' id='Div3'>Test</div>";

	}
}
