<?php
namespace WikiLingo\Event\Expression\Tag;

use WikiLingo\Event;
use WikiLingo\Expression\Tag;

/**
 * Class Allowed
 * @package WikiLingo\Event\Expression\Tag
 */
class Allowed extends Event\Base
{
    /**
     * @param Tag $tag
     */
    public function trigger(Tag &$tag)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($tag);
		}
	}
} 