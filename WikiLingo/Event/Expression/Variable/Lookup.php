<?php
namespace WikiLingo\Event\Expression\Variable;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\Variable;

class Lookup extends Event\Base
{
	public function trigger($key, Renderer\Element &$element, Variable &$variable)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($key, $element, $variable);
		}
	}
} 