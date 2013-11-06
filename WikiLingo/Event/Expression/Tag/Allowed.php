<?php
namespace WikiLingo\Event\Expression\Tag;

use WikiLingo\Event;
use WikiLingo\Expression\Tag;

class Allowed extends Event\Base
{
	public function trigger(Tag &$tag)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($tag);
		}
	}
} 