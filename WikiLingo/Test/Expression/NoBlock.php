<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NoBlock extends Base
{
	public function __construct(&$parser)
	{
		$test = '';
		$this->source =
			" #<-asterisk\n" .
			" *<-start\n" .
			" !<-Exclamation Point";

		$this->expected =
			"<span class='whitespace'> </span>#<span>&lt;</span>-asterisk<br/>" .
			"<span class='whitespace'> </span>*<span>&lt;</span>-start<br/>" .
			"<span class='whitespace'> </span>!<span>&lt;</span>-Exclamation Point";

	}
}
