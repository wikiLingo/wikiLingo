<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;

class TemplateAndVariable extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = (new WikiLingoTestPlugin\TemplateAndVariable($parser))->source;
		$this->source = $parser->parse($this->expected);

	}
}
