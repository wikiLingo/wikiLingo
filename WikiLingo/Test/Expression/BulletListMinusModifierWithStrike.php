<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletListMinusModifierWithStrike extends Base
{
    public function __construct(&$parser)
    {
        $this->source =
            "*---foo--\n" .
            "*---bar--";

        $this->expected =
            "<ul>" .
				"<li><strike>foo</strike></li>" .
				"<li><strike>bar</strike></li>" .
			"</ul>";
    }
}