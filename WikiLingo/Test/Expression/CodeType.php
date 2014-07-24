<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class CodeType extends Base
{
	public function __construct(&$parser)
	{
		$this->source = "-+wikiLingo\n__foo__+-";

		$this->expected = "<textarea class='Code' id='Code0' disabled='true'>__foo__</textarea>";

	}
}
