<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class TemplateAndVariable extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{
        WikiLingo\Expression\Plugin::$indexes['Template'] = 0;
		if ($parser != null) {
            Type::Events($parser->events)
                ->bind(new Event\Expression\Variable\Context(function($plugin) {
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
            "{TEMPLATE(type='lookup')}%variable%{TEMPLATE}";

		$this->expected = "<div class='Template' id='Template1'><span>value 1</span><span>value 2</span></div>";

	}
}
