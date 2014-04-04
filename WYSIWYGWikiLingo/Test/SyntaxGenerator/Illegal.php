<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;
use WYSIWYGWikiLingo\Test\Base;

class illegal extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = (new WikiLingoTestPlugin\illegal($parser))->source;
		$this->source = $parser->parse($this->expected);
	}
}
