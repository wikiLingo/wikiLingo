<?php
namespace WikiLingo\Test\Expression;

use WikiLingo\Test\Base;

class NP extends Base
{
	public function __construct(&$parser)
	{

		$this->source = "-~__foo__ ~np~ & __ foo __~-";

		$this->expected = "__foo__ ~np~ & __ foo __";

	}
}
