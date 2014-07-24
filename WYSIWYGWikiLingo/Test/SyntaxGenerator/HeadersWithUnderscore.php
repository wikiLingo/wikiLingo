<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class HeadersWithUnderscore extends Base
{
	public function __construct(&$parser)
	{

		$this->expected = (new WikiLingoTestExpression\HeadersWithUnderscore($parser))->source;
		$this->source = $parser->parse($this->expected);

		$this->expected = str_replace("!!!!!!!", "!!!!!!", $this->expected);

	}
}
