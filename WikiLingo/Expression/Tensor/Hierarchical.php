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
	public $children;
	public $childrenLength = 0;
	public $parsed;
	public $block = null;
	public $index;

	function __construct(Expression\Block $block = null)
	{
		if ($block != null) {
			$this->block =& $block;

            if (isset($block->parsed))
            {
			    $this->depth = strlen($block->parsed->arguments[0]->text) - 1;
            }

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

	function &addChild(Hierarchical &$child)
	{
		if (!isset($this->children))
		{
			$this->children = new HierarchicalCollection($this->block);
		}

		if (empty($child->parent))
		{
			$child->parent = Type::Hierarchical($this);
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

	function render()
	{
        $element = $this->block->element();

		if (isset($this->block)) {
			if (!empty($this->block->renderedChildren)) {
				$element->staticChildren[] = $this->block->renderedChildren;
			} else if (\method_exists($this->block->expression, "render")) {
				$element->staticChildren[] = $this->block->expression->render();
			}
		}

		if (isset($this->children)) {
			$element->staticChildren[] = $this->children->render();
		}

		return $element->render();
	}
}