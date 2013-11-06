<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:43 PM
 */

namespace WikiLingo\Event\Expression\WordLink;

use WikiLingo\Event;

class Exists extends Event\Base
{
	public $exists = false;
	public function trigger($word, &$exists)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($word, $exists);
		}
	}
} 