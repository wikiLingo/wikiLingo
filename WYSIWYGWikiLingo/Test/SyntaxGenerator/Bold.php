<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class Bold extends Base
{
	public function __construct()
	{

		$this->source = "__foo__ & __ foo __";

		$this->expected = "<strong data-type=''>foo</strong> & <strong> foo </strong>";

	}
}
