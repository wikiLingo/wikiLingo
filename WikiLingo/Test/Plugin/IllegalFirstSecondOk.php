<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class IllegalFirstSecondOk extends Base
{
	public function __construct(&$parser)
	{

		if (!$parser->wysiwyg) {
			$parser->clearTypes();

            Type::Events($parser->events)
                ->bind(new Event\Parsed\RenderPermission(function(Parsed &$parsed) {
                    if (
                        $parsed->type == "Plugin"
                        && $parsed->expression->type == "Illegal"
                    ) {
                        $parsed->expressionPermissible = false;
                    }
                }));
        }

		$this->source =
            "{ILLEGAL()}
		        {DIV()}
!Header 1
!Header 2
		        {DIV}
{ILLEGAL}{DIV()}
!Header 3
{DIV}";

		$this->expected =
            "{ILLEGAL()}
		        {DIV()}
!Header 1
!Header 2
		        {DIV}
{ILLEGAL}<div class='Div' id='Div2'><h1 id='Header+3'>Header 3</h1></div>";

	}
}
