<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 8:07 PM
 */

namespace WikiLingo\Event\Expression\Plugin;

use WikiLingo\Event\Base;
use WikiLingo\Expression\Plugin;

class CanExecute extends Base
{
	public function trigger(Plugin &$plugin)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($plugin);
		}
	}
} 