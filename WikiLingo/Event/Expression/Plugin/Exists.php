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

/**
 * Class Exists
 * @package WikiLingo\Event\Expression\Plugin
 */
class Exists extends Event\Base
{
    /**
     * @param Plugin $plugin
     */
    public function trigger(Plugin $plugin)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($plugin);
		}
	}
} 