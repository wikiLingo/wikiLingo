<?php
namespace WikiLingo\Event\Expression\Variable;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\Variable;

/**
 * Class Lookup
 * @package WikiLingo\Event\Expression\Variable
 */
class Lookup extends Event\Base
{
    /**
     * @param $key
     * @param Renderer\Element $element
     * @param Variable $variable
     */
    public function trigger($key, Renderer\Element &$element, Variable &$variable)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($key, $element, $variable);
		}
	}
} 