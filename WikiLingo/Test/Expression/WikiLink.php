<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class WikiLink extends Base
{
	public function __construct()
	{
        $this->source = "((foo))";

		$this->expected = "<a href='foo'>foo</a>";
	}
}
