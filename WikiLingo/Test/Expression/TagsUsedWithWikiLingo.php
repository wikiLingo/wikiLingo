<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class TagsUsedWithWikiLingo extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "<b>This is a test</b> __This is also a test__ <script></script> ";

		$this->expected = "<b>This is a test</b><span class='whitespace'> </span><strong>This is also a test</strong><span class='whitespace'> </span><code>&lt;script&gt;</code><code>&lt;/script&gt;</code><span class='whitespace'> </span>";

	}
}
