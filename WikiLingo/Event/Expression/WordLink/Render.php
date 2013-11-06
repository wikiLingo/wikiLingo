<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:43 PM
 */

namespace WikiLingo\Event\Expression\WordLink;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\WordLink;

class Render extends Event\Base
{
	public function trigger(Renderer\Element &$element, WordLink &$wordLink)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $wordLink);
		}
	}
} 