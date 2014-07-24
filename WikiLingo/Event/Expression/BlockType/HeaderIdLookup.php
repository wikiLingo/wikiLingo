<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 7/24/14
 * Time: 3:24 PM
 */

namespace WikiLingo\Event\Expression\BlockType;


use WikiLingo\Event;
use WikiLingo\Expression\BlockType\Header;

class HeaderIdLookup extends Event\Base
{
	/**
	 * @param String $id
	 * @param Header $header
	 * @return String
	 */
	public function trigger($id, Header $header)
	{
		foreach($this->delegates as &$delegate)
		{
			$newId = $delegate($id, $header);
			if ($newId !== null) {
				return $newId;
			}
		}

		return $id;
	}
} 