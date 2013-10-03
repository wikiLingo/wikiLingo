<?php
namespace WikiLingo\Expression\Tensor;

use Types\Type;
use WikiLingo;
use WikiLingo\Expression;
use WikiLingo\Renderer;

class Hierarchical
{
	public $depth;
	public $parent;
	public $parser;
	public $children;
	public $childrenLength = 0;
	public $parsed;
	public $block = null;
	public $index;
	public $renderClass = 'listItem';
	public $element;
	public $collectionElementName;

	function __construct($collectionElementName, $elementName, Expression\Block &$block = null)
	{
		$this->collectionElementName = $collectionElementName;
		$this->element = new Renderer\Element(__CLASS__, $elementName);

		if ($block != null) {
			$this->block =& $block;
			$this->depth = strlen($block->parsed->arguments[0]->text) - 1;

		}
	}

	function &setParent(Hierarchical &$parent)
	{
		if (empty($this->parent))
		{
			$this->parent =& $parent;
		}
		$parent->addChild($this);
		return $this;
	}

	function setParser(&$parser)
	{
		$this->parser =& $parser;
	}

	function &addChild(Hierarchical &$child)
	{
		if (!isset($this->children))
		{
			$this->children = new HierarchicalCollection($this->collectionElementName);
		}

		if (empty($child->parent))
		{
			$child->parent =& Type::Hierarchical($this);
		}
		$this->children->push($child);
		$this->childrenLength++;
		return $this;
	}

	function &addSibling(Hierarchical &$sibling)
	{
		if (isset($this->parent))
		{
			$sibling->parent =& $this->parent;

			Type::Hierarchical($this->parent)->addChild($sibling);
		}

		return $this;
	}

	function render(&$parser)
	{
		if (isset($this->block)) {
			$this->element->staticChildren[] = $this->block->renderedChildren;
		}

		if (isset($this->children)) {
			$this->element->staticChildren[] = $this->children->render($parser);
		}

		return $this->element->render();
	}
}