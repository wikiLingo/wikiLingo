<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class TemplatesNestedContexts extends Base
{
	public function __construct(&$parser)
	{
        $parser->clearTypes();
		$parser->events->WikiLingoEventExpressionVariableContext = array();

		if ($parser != null) {
            Type::Events($parser->events)

	            ->bind(new Event\Expression\Variable\Context(function(WikiLingo\Expression\Plugin $plugin) {
                    $type = $plugin->parameter('type');
                    switch ($type)
                    {
                        case 'parent':
                            return array(
                                array(
                                    "name" => "first parent"
                                ),
                                array(
                                    "name" => "second parent"
                                )
                            );

	                    case 'child':
		                    return array(
			                    array(
				                    "name" => "first child"
			                    )
		                    );
                    }

                    return null;
                }));
        }

		$this->source =
            "{TEMPLATE(type=`parent`)}
%name%
{TEMPLATE(type=`child`)}
%name%
{TEMPLATE}
{TEMPLATE}";

		$this->expected =
			"<br/>" .
			"<span>first parent</span><br/>" .
			"<br/>" .
			"<span>first child</span><br/>" .
			"<br/>" .
			"<br/>" .
			"<span>second parent</span><br/>" .
			"<br/>" .
			"<span>first child</span><br/>" .
			"<br/>";

	}
}
