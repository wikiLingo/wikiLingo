<?php
namespace WikiLingo\Test\Expression;

use WikiLingo;
use WikiLingo\Test\Base;

class WikiLinkType extends Base
{
	public function __construct(WikiLingo\Parser &$parser)
	{
        $parser->bind("WikiLingo\\Expression\\WikiLinkType", "render", function(&$element) {});

        $this->source = "(type(foo))";

		$this->expected = "<a href='foo'>foo</a>";
	}
}
