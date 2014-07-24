<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class Permission extends Base
{
	public function __construct(&$parser)
	{

        if (!$parser->wysiwyg) {
            Type::Events($parser->events)
                ->bind(new Event\Parsed\RenderPermission(function(Parsed &$parsed) {
                    if (
                        $parsed->type == "Plugin"
                        && $parsed->expression->type == "Permission"
                    ) {
                        $allow = $parsed->expression->parametersRaw['allow'];
                        $parsed->expressionPermissible = ($allow == 'true' ? true : false);
                    }
                }))
                ->bind(new Event\Parsed\RenderBlocked(function(Parsed &$parsed, &$return) {
                    $return = '';
                }));
        }

        $this->source = <<<WL
{PERMISSION(allow="true")}
:)
{PERMISSION}
{PERMISSION(allow="false")}
:(
{PERMISSION}
WL
    ;
        $this->expected = "<div class='Permission' id='Permission1'><br/>:)<br/></div><br/>";
	}
}
