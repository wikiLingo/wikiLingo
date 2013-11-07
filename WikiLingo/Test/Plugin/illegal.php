<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class illegal extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{

		if ($parser != null) {
			$parser->types['WikiLingo\Expression\Header'] = array();

            Type::Events($parser->events)
                ->bind(new Event\Parsed\RenderPermission(function(Parsed &$parsed) {
                    if (
                        $parsed->type == "Plugin"
                        && $parsed->expression->name == "illegal"
                    ) {
                        $parsed->expressionPermissible = false;
                    }
                }))
                ->bind(new Event\Parsed\RenderBlocked(function(Parsed &$parsed, &$return) {
                    $return = '';
                }));
        }

		$this->source =
            "{ILLEGAL()}
                {HTML()}
!Header 1
!Header 2
                {HTML}
{ILLEGAL}";

		$this->expected = "";

	}
}
