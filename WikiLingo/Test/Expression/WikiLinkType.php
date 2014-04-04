<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class WikiLinkType extends Base
{
	public function __construct(&$parser)
	{
        $this->source = "(type(foo))";

		$this->expected = "<a href='foo'>foo</a>";
	}
}
