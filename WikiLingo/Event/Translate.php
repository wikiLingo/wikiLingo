<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 12/8/13
 * Time: 4:56 PM
 */

namespace WikiLingo\Event;


class Translate extends Base
{
	public function trigger(&$value, $context)
	{
		foreach($this->delegates as &$delegate)
		{
			return $delegate($value, $context);
		}

		return $value;
	}
} 