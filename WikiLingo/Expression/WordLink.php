<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

class WordLink extends Base
{
	public $exists = false;
	public $href;
	public $text;

	function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
		$parsed->parser->trigger(__CLASS__, "exists", $this);
	}

	public function render(&$parser)
	{
		if ($this->exists) {
			$result = "";

			$parser->trigger(__CLASS__, "render", $this, $result);

			return $result;
		} else {
			return $this->parsed->text;
		}
	}
}