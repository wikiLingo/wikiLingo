<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/11/13
 * Time: 9:28 PM
 */

namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingo;
use WikiLingo\Test\Base;
use WikiLingo\Event;
use WikiLingo\Test\Plugin as WikiLingoTestPlugin;

class PluginAttributes extends Base
{
	public function __construct(&$parser)
	{
		$this->expected = '{DIV(attr1=`something` attr2=`something else`)}
{DIV}';
		$this->source = $parser->parse($this->expected);

	}
} 