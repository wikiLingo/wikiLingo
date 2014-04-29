<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletListPlusModifier extends Base
{
    public function __construct(&$parser)
    {
        $this->source =
            "*+foo\n" .
            "*+bar";

        $this->expected =
            "<ul>" .
				"<li>foo</li>" .
				"<li>bar</li>" .
			"</ul>";
    }
}