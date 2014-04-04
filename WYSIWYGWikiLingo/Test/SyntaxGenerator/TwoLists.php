<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class TwoLists extends Base
{
	public function __construct(&$parser)
	{

		$this->expected = (new WikiLingoTestExpression\TwoLists($parser))->source;
		$this->source = $parser->parse($this->expected);

	}
}
