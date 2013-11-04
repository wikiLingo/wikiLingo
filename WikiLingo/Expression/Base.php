<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

abstract class Base
{
	public $parsed;
	public $allowLines = true;
	public $allowLineAfter = true;

	function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
	}

	function parent()
	{
		if (isset($this->parsed->parent)) {
			return Type::Parsed($this->parsed->parent);
		}
		return null;
	}

    public $renderedChildren = '';

	abstract function render(&$parser);

    public function preRender(&$parser)
    {
    }
}