<?php
namespace WikiLingo\Expression;

use WikiLingo;

abstract class Base
{
	public $parsed;
	public $allowsBreaks = true;

	function __construct(WikiLingo\Parsed &$parsed)
	{
		$this->parsed =& $parsed;
	}

	function parent()
	{
		if (isset($this->parsed->parent->expression)) {
			return $this->parsed->parent->expression;
		}
		return null;
	}

    public $renderedChildren = '';

	abstract function render(&$parser);

    public function preRender(&$parser)
    {
    }
}