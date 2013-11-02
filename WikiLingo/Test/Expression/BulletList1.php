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
            '<ul>' .
				'<li> foo</li>' .
				'<li> bar</li>' .
			'</ul>';
    }
}