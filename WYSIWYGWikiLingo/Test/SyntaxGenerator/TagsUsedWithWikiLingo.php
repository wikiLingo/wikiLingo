<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class TagsUsedWithWikiLingo extends Base
{
	public function __construct()
	{

		$this->source = "<b>This is a test</b> __This is also a test__ <script></script> ";

		$this->expected = "<b>This is a test</b> <strong>This is also a test</strong> &lt;script&gt;&lt;/script&gt; ";

	}
}
