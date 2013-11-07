<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:42 PM
 */

namespace WikiLingo\Event\Parsed;

use WikiLingo\Event\Base;
use WikiLingo\Parsed;

class RenderBlocked extends Base
{
	public function trigger(Parsed &$parsed, &$return)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($parsed, $return);
		}
	}
} 