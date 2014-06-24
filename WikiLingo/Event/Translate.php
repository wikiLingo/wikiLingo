<?php

namespace WikiLingo\Event;

/**
 * Class Translate
 * @package WikiLingo\Event
 */
class Translate extends Base
{
    /**
     * @param String $value
     * @param String $context
     * @return String
     */
    public function trigger(&$value, $context)
	{
		foreach($this->delegates as $delegate)
		{
			return $delegate($value, $context);
		}

		return $value;
	}
} 