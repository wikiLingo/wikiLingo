<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Plugin extends Base
{
	public function __construct()
	{

		$this->source = "{html test='test'}{HTML()}{HTML} {HTML()}Test{HTML}";

		$this->expected = "<span id='html1'/><span id='html2'/> <span id='html3'>Test</span>";

	}
}
