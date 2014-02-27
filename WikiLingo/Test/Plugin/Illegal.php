<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class Illegal extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{

		if ($parser != null) {
			$parser->types['WikiLingo\Expression\Header'] = array();

            Type::Events($parser->events)
                ->bind(new Event\Parsed\RenderPermission(function(Parsed &$parsed) {
                    if (
                        $parsed->type == "Plugin"
                        && $parsed->expression->type == "Illegal"
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
                {DIV()}
!Header 1
!Header 2
                {DIV}
{ILLEGAL}";

		$this->expected = "";

	}
}
