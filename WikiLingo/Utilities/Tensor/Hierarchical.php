<?php
namespace WikiLingo\Utilities\Tensor;

use WikiLingo;
use WikiLingo\Expression;
use WikiLingo\Renderer;

/**
 * Class Hierarchical
 * @package WikiLingo\Expression\Tensor
 */
class Hierarchical
{
	public $depth;

    /**
     * @var Hierarchical
     */
    public $parent;
    /**
     * @var HierarchicalCollection
     */
    public $children;
	public $childrenLength = 0;
	public $index;


    /**
     * @param Hierarchical $parent
     * @return $this
     */
    function setParent($parent)
	{
		if (empty($this->parent))
		{
			$this->parent = $parent;
		}
		$parent->addChild($this);
		return $this;
	}

    /**
     * @param Hierarchical $child
     * @return $this
     */
    function addChild($child)
	{
		if (empty($child->parent))
		{
			$child->parent = $this;
		}
		$this->children->push($child);
		$this->childrenLength++;
		return $this;
	}

    /**
     * @param Hierarchical $sibling
     * @return $this
     */
    function addSibling($sibling)
	{
		if (isset($this->parent))
		{
			$sibling->parent = $this->parent;

			$this->parent->addChild($sibling);
		}

		return $this;
	}
}