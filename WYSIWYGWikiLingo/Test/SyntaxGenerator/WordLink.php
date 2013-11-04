<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class WordLink extends Base
{
	public function __construct(WikiLingoWYSIWYG\Parser &$parser)
	{
		$this->expected = (new WikiLingoTestExpression\WordLink())->source;
		$this->source = $parser->parse($this->expected);
	}
}
