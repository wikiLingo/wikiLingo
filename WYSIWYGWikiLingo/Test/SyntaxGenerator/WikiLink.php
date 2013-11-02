<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class WikiLink extends Base
{
	public function __construct()
	{
        $this->source = "((foo))";

		$this->expected = "<a href='foo'>foo</a>";
	}
}
