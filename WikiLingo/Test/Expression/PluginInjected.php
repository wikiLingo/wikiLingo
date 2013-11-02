<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test;
use WikiLingo\Test\Base;

class PluginInjected extends Base
{
	public function __construct(WikiLingo\Parser &$parser)
	{
		$parser->bind('WikiLingo\Expression\Plugin', 'Exists', function(&$plugin) use (&$parser) {
			switch ($plugin->name) {
				case "injected":
					$plugin->className = "\\Tests\\injected";
					$plugin->class = $parser->pluginInstances['injected'] =& new Test\injected();
					break;
			}
		});

		$this->source = "{INJECTED()}__I've been injected!__{INJECTED}";

		$this->expected = "<span id='injected1'><strong>I've been injected!</strong></span>";

	}
}
