<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;

class TocContentFollowing extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = (new WikiLingoTestPlugin\TocContentFollowing($parser))->source;
		$this->source = $parser->parse($this->expected);
	}
}
