<?php

namespace WikiLingo\Event\Expression\WikiLinkType;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\WikiLinkType;

/**
 * Class Render
 * @package WikiLingo\Event\Expression\WikiLinkType
 */
class Render extends Event\Base
{
    /**
     * @param Model\Element $element
     * @param WikiLinkType $wikiLinkType
     */
    public function trigger(Model\Element &$element, WikiLinkType &$wikiLinkType)
	{
		foreach($this->delegates as $delegate)
		{
			$delegate($element, $wikiLinkType);
		}
	}
} 