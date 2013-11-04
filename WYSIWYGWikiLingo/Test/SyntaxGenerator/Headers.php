<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class Headers extends Base
{
	public function __construct(WikiLingoWYSIWYG\Parser &$parser)
	{

		$this->expected = (new WikiLingoTestExpression\Headers())->source;
		$this->source = $parser->parse($this->expected);

		$this->expected = str_replace("!!!!!!!", "!!!!!!", $this->expected);

	}
}
