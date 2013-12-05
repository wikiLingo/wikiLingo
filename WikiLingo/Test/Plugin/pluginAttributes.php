<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/11/13
 * Time: 9:28 PM
 */

namespace WikiLingo\Test\Plugin;

use Types\Type;
use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Parsed;

class pluginAttributes extends Base
{
	public function __construct(WikiLingo\Parser &$parser = null)
	{
		$this->source =
			"{HTML(attr1 = something attr2 = 'something else')}
{HTML}";

		$this->expected = "<span class='html' id='html5'><br class='hidden'/></span>";

	}
} 