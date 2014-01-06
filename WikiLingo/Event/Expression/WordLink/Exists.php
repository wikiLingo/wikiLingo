<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/5/13
 * Time: 1:43 PM
 */

namespace WikiLingo\Event\Expression\WordLink;

use WikiLingo\Event;

/**
 * Class Exists
 * @package WikiLingo\Event\Expression\WordLink
 */
class Exists extends Event\Base
{
    /**
     * @var bool
     */
    public $exists = false;

    /**
     * @param String $word
     * @param Boolean $exists
     */
    public function trigger($word, &$exists)
	{
		foreach($this->delegates as &$delegate)
		{
			$delegate($word, $exists);
		}
	}
} 