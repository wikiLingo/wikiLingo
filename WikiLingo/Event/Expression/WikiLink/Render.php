<?php

namespace WikiLingo\Event\Expression\WikiLink;

use WikiLingo\Model;
use WikiLingo\Event;
use WikiLingo\Expression\WikiLink;

/**
 * Class Render
 * @package WikiLingo\Event\Expression\WikiLink
 */
class Render extends Event\Base
{
    /**
     * @param Model\Element $element
     * @param WikiLink $wikiLink
     */
    public function trigger(Model\Element &$element, WikiLink &$wikiLink)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($element, $wikiLink);
		}
	}
} 