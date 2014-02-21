<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class Plugin extends Base
{
	public function __construct()
	{

		WikiLingo\Expression\Plugin::$indexes['Html'] = null;
		//$parser->typesCount['html'] = 0;

		$this->source = "{html test=`test`}{HTML()}{HTML} {HTML()}Test{HTML}";

		$this->expected = "<span class='Html' id='Html1'></span><span class='Html' id='Html2'></span><span class='whitespace'> </span><span class='Html' id='Html3'>Test</span>";

	}
}
