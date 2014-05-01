<?php
namespace WikiLingo\Test\Plugin;

use WikiLingo;
use WikiLingo\Test\Base;

class TocContentFollowing extends Base
{
	public function __construct(&$parser)
	{

		if ($parser != null) {
			$parser->clearTypes();
		}

		$this->source = "{toc}<br/>test test test:<br><pre>{Non Plugin} post test</pre>";

		$this->expected = "<div class='Toc' id='Toc1'></div><br/>test test test:<br><pre>{Non Plugin}<span class='whitespace'> </span>post test</pre>";

	}
}
