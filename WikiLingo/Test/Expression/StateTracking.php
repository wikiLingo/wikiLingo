<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class StateTracking extends Base
{
	public function __construct(&$parser)
	{

		$this->source =
			"__Here\n" .
			"''we are test\n" .
			"''\n" .
			"===Tracking===\n" .
			"--it can get--\n" .
			"::complex at times, so we want it\n" .
				"~~purple:to be right\n" .
				"so that it is easy on the end user~~\n" .
				"See how we can handle multi lines easily?\n" .
			"::.\n" .
			"This should be bold\n" .
			"\n";

		$this->expected =
            "__Here<br/>" .
            "<i>we are test<br/>" .
            "</i><br/>" .
            "<u>Tracking</u><br/>" .
            "<strike>it can get</strike><br/>" .
            "<div class='center'>complex at times, so we want it<br/>" .
                "<span style='color:purple;'>to be right<br/>" .
                'so that it is easy on the end user</span><br/>' .
                "See how we can handle multi lines easily?<br/>" .
            "</div>.<br/>" .
            "This should be bold<br/>" .
            "<br/>";

	}
}
