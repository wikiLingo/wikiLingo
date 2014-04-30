<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class PluginOpened extends Base
{
    public function __construct(&$parser)
    {
        $this->expected = (new WikiLingo\Test\Plugin\Opened($parser))->source;
        $this->source = $parser->parse($this->expected);
    }
}
