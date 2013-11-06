<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:43 PM
 */

namespace WikiLink\Event\Expression\WikiLink;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\WikiLink;

class Render extends Event\Base
{
	public function trigger(Renderer\Element &$element, WikiLink &$wikiLink)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $wikiLink);
		}
	}
} 