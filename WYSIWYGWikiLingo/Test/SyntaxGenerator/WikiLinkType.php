<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class WikiLinkType extends Base
{
	public function __construct()
	{
        $this->source = "(type(foo))";

		$this->expected = "<a href='foo'>foo</a>";
	}
}
