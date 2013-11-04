<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WikiLingo\Expression;
use WikiLingo\Parser;
use WikiLingo\Test\Base;

class NoLineSkipping extends Base
{
	public function __construct(WikiLingoWYSIWYG\Parser &$parser)
	{
		Expression\Plugin::$indexes = array();

		$this->expected = (new WikiLingoTestExpression\NoLineSkipping())->source;
		$this->source = $parser->parse($this->expected);

	}
}
