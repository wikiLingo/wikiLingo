<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class Title extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "-=foo=-";

		$this->expected = "<div class='title'>foo</div>";

	}
}
