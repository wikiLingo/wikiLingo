<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TagsUsedWithWikiLingo extends Base
{
	public function __construct()
	{

		$this->source = "<b>This is a test</b> __This is also a test__ <script></script> ";

		$this->expected = "<b>This is a test</b><span class='whitespace'> </span><strong>This is also a test</strong><span class='whitespace'> </span>&lt;script&gt;&lt;/script&gt;<span class='whitespace'> </span>";

	}
}
