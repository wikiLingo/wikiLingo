<?php
namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class Custom extends Base
{
	public function __construct(&$parser)
	{

		if (!$parser->wysiwyg) {
			$parser->clearTypes();
            WikiLingo\Expression\Plugin::$customClasses['CustomPlugin'] = new CustomPlugin();
        }

		$this->source =
            "{CUSTOM_PLUGIN()}{CUSTOM_PLUGIN}";

		$this->expected = "<span class='CustomPlugin' id='CustomPlugin1'>This is a custom injected plugin</span>";

	}
}


class CustomPlugin extends WikiLingo\Plugin\Base
{
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$renderer, &$parser)
    {
        $plugin->renderedChildren = "This is a custom injected plugin";

        return parent::render($plugin, $body, $renderer, $parser);
    }
}