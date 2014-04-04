<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NP extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "~np~__foo__ ~np~ & __ foo __~/np~";

		$this->expected = "__foo__ ~np~ & __ foo __";

	}
}
