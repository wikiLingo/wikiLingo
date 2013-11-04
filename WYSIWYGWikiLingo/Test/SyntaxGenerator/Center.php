<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class Center extends Base
{
	public function __construct(WikiLingoWYSIWYG\Parser &$parser)
	{
		$this->expected = (new WikiLingoTestExpression\Center())->source;
		$this->source = $parser->parse($this->expected);
	}
}
