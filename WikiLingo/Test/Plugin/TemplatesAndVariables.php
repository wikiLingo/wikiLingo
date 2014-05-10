<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class TemplatesAndVariables extends Base
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
                        case 'lookup1':
                            return array(
                                array(
                                    "variable" => "1.1"
                                ),
                                array(
                                    "variable" => "1.2"
                                )
                            );

	                    //lookup 2 is null, thus should not be shown
	                    case 'lookup2': return null;
	                    
	                    case 'lookup3':
		                    return array(
			                    array(
				                    "variable" => "3.1"
			                    ),
			                    array(
				                    "variable" => "3.2"
			                    )
		                    );
                    }

                    return null;
                }));
        }

		$this->source =
            "{TEMPLATE(type=`lookup1`)}%variable%{TEMPLATE}
{TEMPLATE(type=`lookup2`)}%variable%{TEMPLATE}
{TEMPLATE(type=`lookup3`)}%variable%{TEMPLATE}";

		$this->expected = "<span>1.1</span><span>1.2</span><br/><br/><span>3.1</span><span>3.2</span>";

	}
}
