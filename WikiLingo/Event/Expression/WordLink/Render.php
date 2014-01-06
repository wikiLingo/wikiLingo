<?php

namespace WikiLingo\Event\Expression\WordLink;

use WikiLingo\Renderer;
use WikiLingo\Event;
use WikiLingo\Expression\WordLink;

/**
 * Class Render
 * @package WikiLingo\Event\Expression\WordLink
 */
class Render extends Event\Base
{
    /**
     * @param Renderer\Element $element
     * @param WordLink $wordLink
     */
    public function trigger(Renderer\Element &$element, WordLink &$wordLink)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $wordLink);
		}
	}
} 