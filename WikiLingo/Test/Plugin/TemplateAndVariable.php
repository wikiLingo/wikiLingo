<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class TemplateAndVariable extends Base
{
	public function __construct(&$parser)
	{

		if ($parser != null) {
            Type::Events($parser->events)

	            ->bind(new Event\Expression\Variable\Context(function(WikiLingo\Expression\Plugin $plugin) {
                    $type = $plugin->parameter('type');
                    switch ($type)
                    {
                        case 'lookup':
                            return array(
                                array(
                                    "variable" => "value 1"
                                ),
                                array(
                                    "variable" => "value 2"
                                )
                            );
                    }

                    return array();
                }));
        }

		$this->source =
            "{TEMPLATE(type=`lookup`)}%variable%{TEMPLATE}";

		$this->expected = "<span>value 1</span><span>value 2</span>";

	}
}
