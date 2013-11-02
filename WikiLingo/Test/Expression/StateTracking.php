<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class StateTracking extends Base
{
	public function __construct()
	{

		$this->source =
			"__Here\n" .
			"''we are test\n" .
				"^testing state^\n" .
			"''\n" .
			"===Tracking===\n" .
			"--it can get--\n" .
			"::complex at times, so we want it\n" .
				"~~purple:to be right\n" .
					"^even in complex scenarios^\n" .
				"so that it is easy on the end user~~\n" .
				"See how we can handle multi lines easily?\n" .
			"::.\n" .
			"This should be bold\n" .
			"\n";

		$this->expected =
            "__Here<br/>\n" .
            "<i>we are test<br/>\n" .
                '<div class="box">testing state</div><br/>' . "\n" .
            "</i><br/>\n" .
            "<u>Tracking</u><br/>\n" .
            "<strike>it can get</strike><br/>\n" .
            '<div class="center">complex at times, so we want it<br/>' . "\n" .
                "<span style='color:purple;'>to be right<br/>\n" .
                    '<div class="box">even in complex scenarios</div><br/>' . "\n" .
                'so that it is easy on the end user</span><br/>' . "\n" .
                "See how we can handle multi lines easily?<br/>\n" .
            "</div>.<br/>\n" .
            "This should be bold<br/>\n" .
            "<br/>\n";

	}
}
