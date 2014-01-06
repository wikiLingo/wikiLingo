<?php
namespace WikiLingo\Event\Expression\Tag;

use WikiLingo\Event;
use WikiLingo\Expression\Tag;
use WikiLingo\Renderer\Element;

/**
 * Class Render
 * @package WikiLingo\Event\Expression\Tag
 */
class Render extends Event\Base
{
    /**
     * @param Element $element
     * @param Tag $tag
     */
    public function trigger(Element &$element, Tag &$tag)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $tag);
		}
	}
} 