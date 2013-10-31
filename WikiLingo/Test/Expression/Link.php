<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Link extends Base
{
	public function __construct()
	{

		$this->source = "[www.google.com] [www.google.com|Google]";

		$this->expected = "<a href='www.google.com'>www.google.com</a> <a href='www.google.com'>Google</a>";

	}
}
