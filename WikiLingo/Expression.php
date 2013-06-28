<?php

class WikiLingo_Expression extends Jison_ParserValue
{
	public $stringBefore = '';
	public $stringAfter = '';
	public $parent;
	public $siblings = array();
	public $siblingsCount = 0;
	public $children = array();
	public $childrenCount = 0;
	public $childrenRenderFirst = true;

	public function __construct(&$stringBefore = '', $stringAfter = '')
	{
		$this->stringBefore = $stringBefore;
		$this->stringAfter = $stringAfter;
	}

	public function render(&$parser)
	{
		$siblings = '';
		$children = '';

		foreach($this->siblings as $sibling)
		{
			$siblings .= $sibling->render($parser);
		}

		foreach($this->children as $child)
		{
			$children .= $child->render($parser);
		}
		return $this->stringBefore . $children . $this->stringAfter . $siblings;
	}

	public function addChild(&$child)
	{
		$child->parent = &$this;
		$this->children[] &= $child;
		$this->childrenCount++;
	}

	public function addSibling(&$sibling)
	{
		$this->siblings[] = $sibling;
		$this->siblingsCount++;

		return $this;
	}
}