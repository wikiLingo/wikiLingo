<?php
namespace WikiLingo\Event\Expression\Variable;

use WikiLingo\Model;
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
     * @param Model\Element $element
     * @param Variable $variable
     */
    public function trigger($key, Model\Element &$element, Variable &$variable)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($key, $element, $variable);
		}
	}
} 