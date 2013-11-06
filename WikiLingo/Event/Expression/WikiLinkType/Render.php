<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:43 PM
 */

namespace WikiLink\Event\Expression\WikiLinkType;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\WikiLinkType;

class Render extends Event\Base
{
	public function trigger(Renderer\Element &$element, WikiLinkType &$wikiLinkType)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $wikiLinkType);
		}
	}
} 