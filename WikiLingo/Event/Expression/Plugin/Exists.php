<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:40 PM
 */

namespace WikiLingo\Event\Expression\Plugin;

use WikiLingo\Event;
use WikiLingo\Expression\Plugin;

class Exists extends Event\Base
{
	public function trigger(Plugin &$plugin)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($plugin);
		}
	}
} 