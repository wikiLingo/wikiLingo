<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class Page extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = (new WikiLingoTestExpression\Page($parser))->source;
		$this->source = $parser->parse($this->expected);
	}
}
