<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 8:07 PM
 */

namespace WikiLingo\Event\Parsed;

use WikiLingo\Event\Base;
use WikiLingo\Parsed;

/**
 * Class RenderPermission
 * @package WikiLingo\Event\Parsed
 */
class RenderPermission extends Base
{
    /**
     * @param Parsed $parsed
     * @param Parsed $parsed
     */
    public function trigger(Parsed &$parsed)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($parsed);
		}
	}
} 