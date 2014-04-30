<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class Opened extends Base
{
	public function __construct(&$parser)
	{

		if (!$parser->wysiwyg) {
			$parser->clearTypes();
        }

		$this->source =
            "{DIV()}__hi!__";

		$this->expected = "{DIV()}<strong>hi!</strong>";

	}
}
