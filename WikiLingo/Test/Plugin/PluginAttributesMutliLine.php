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

class PluginAttributesMutliLine extends Base
{
	public function __construct(&$parser)
	{
		$this->source =
"{DIV(
    attr1 = something
    attr2 = 'something else'
)}
{DIV}

{div
    attr1 = something
    attr2 = 'something else'
}";

		$this->expected = "<div class='Div' id='Div1'><br/></div><br/><br/><div class='Div' id='Div2'></div>";
	}
} 