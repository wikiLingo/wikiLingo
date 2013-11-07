<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;
use WYSIWYGWikiLingo\Test\Base;

class illegal extends Base
{
	public function __construct(WikiLingoWYSIWYG\Parser &$parser)
	{
		$this->expected = (new WikiLingoTestPlugin\illegal())->source;
		$this->source = $parser->parse($this->expected);
	}
}
