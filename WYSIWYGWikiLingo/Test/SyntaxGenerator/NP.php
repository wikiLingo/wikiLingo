<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WYSIWYGWikiLingo\Test\Base;

class NP extends Base
{
	public function __construct()
	{

		$this->source = "~np~__foo__ ~np~ & __ foo __~/np~";

		$this->expected = "__foo__ ~np~ & __ foo __";

	}
}
