<?php
namespace WikiLingo\Event\Expression\Variable;

use WikiLingo\Model;
use WikiLingo\Event;
use WikiLingo\Expression\Variable;

/**
 * Class Context
 * @package WikiLingo\Event\Expression\Variable
 */
class Context extends Event\Base
{
    /**
     * @param $plugin
     * @return array
     */
    public function trigger(&$plugin)
	{
        $result = array();
		foreach($this->delegates as $delegate)
		{
			return $delegate($plugin);
		}
        return $result;
	}
} 