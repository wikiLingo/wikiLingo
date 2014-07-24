<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:41 PM
 */

namespace WikiLingo\Event\Expression\Plugin;

use WikiLingo\Event;
use WikiLingo\Expression\Plugin;

/**
 * Class PostRender
 * @package WikiLingo\Event\Expression\Plugin
 */
class PostRender extends Event\Base
{
    /**
     * @param Boolean $rendered
     * @param Plugin $plugin
     */
    public function trigger($rendered, Plugin $plugin)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($rendered, $plugin);
		}
	}
} 