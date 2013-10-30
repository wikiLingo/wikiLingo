<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class BulletList1 extends Base
{
    public function __construct()
    {
        $this->source =
            "* foo\n" .
            "* bar";

        $this->expected =
            '<ul class="wl-parent">' .
				'<li class="unorderedListItem"> foo</li>' .
				'<li class="unorderedListItem"> bar</li>' .
			'</ul>';
    }
}