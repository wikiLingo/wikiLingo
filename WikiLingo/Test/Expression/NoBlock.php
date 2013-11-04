<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NoBlock extends Base
{
	public function __construct()
	{
		$test = '';
		$this->source =
			" #<-asterisk\n" .
			" *<-start\n" .
			" !<-Exclamation Point";

		$this->expected =
			" #<span>&lt;</span>-asterisk<br/>" .
			" *<span>&lt;</span>-start<br/>" .
			" !<span>&lt;</span>-Exclamation Point";

	}
}
