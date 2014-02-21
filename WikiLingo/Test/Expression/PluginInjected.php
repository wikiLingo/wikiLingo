<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test;
use WikiLingo\Test\Base;
use WikiLingo\Event\Expression\Plugin\Exists;

class PluginInjected extends Base
{
	public function __construct(WikiLingo\Parser &$parser)
	{
		$fn = function(WikiLingo\Expression\Plugin &$plugin) use (&$parser) {
			switch ($plugin->type) {
				case "Injected":
					$plugin->className = "\\Test\\Injected";
					$plugin->class = $parser->pluginInstances['Injected'] = new Test\Injected();
					break;
			}
		};

		$parser->events->bind(new Exists($fn));

		$this->source = "{INJECTED()}__I've been injected!__{INJECTED}";

		$this->expected = "<span class='Injected' id='Injected1'><strong>I've been injected!</strong></span>";

	}
}
