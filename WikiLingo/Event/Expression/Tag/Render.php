<?php
namespace WikiLingo\Event\Expression\Tag;

use WikiLingo\Event;
use WikiLingo\Expression\Tag;
use WikiLingo\Renderer\Element;

class Render extends Event\Base
{
	public function trigger(Element &$element, Tag &$tag)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($element, $tag);
		}
	}
} 