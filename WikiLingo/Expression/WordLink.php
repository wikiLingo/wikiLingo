<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

class WordLink extends Base
{
	public $href;
	public $text;

	public function render(&$parser)
	{
		$result = "";

		$parser->trigger(__CLASS__, "render", $this, $result);

		return $result;
	}
}