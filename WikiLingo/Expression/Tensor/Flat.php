<?php
/**
 * @namespace
 */
namespace WikiLingo\Expression\Tensor;

use Types\Type;
use WikiLingo;
use WikiLingo\Expression\Block;
/**
 * A flat manages the creation of the Hierarchical items.  There is only one flat for a Hierarchical group.
 * @constructor
 */
class Flat
{
	/**
	 * @var \WikiLingo\Expression\Block
	 * set from the parent
	 */
	public $block;

	/**
	 * @var HierarchicalCollection
	 */
	public $leaders;

	/**
	 * @var int
	 */
	public $activeDepth = 0;

	/**
	 * @var array(Hierarchical)
	 */
	public $items = array();

	/**
	 * @var array(Hierarchical)
	 */
	public $parents = array();

	/**
	 * @var array(Integer)
	 */
	public $parentActive = array();
	public $beginningLineNo;
	public $endingLineNo;
	public $length = 0;
	public $hierarchicalCollectionElementName;
	public $hierarchicalElementName;

	/**
	 * @param $hierarchicalCollectionElementName
	 * @param $hierarchicalElementName
	 * @param Block $block
	 */
	public function __construct($hierarchicalCollectionElementName, $hierarchicalElementName, Block &$block)
	{
		$this->hierarchicalCollectionElementName = $hierarchicalCollectionElementName;
		$this->hierarchicalElementName = $hierarchicalElementName;
		$this->block =& $block;
		$this->leaders = new HierarchicalCollection($this->hierarchicalCollectionElementName);
		$item = new Hierarchical($this->hierarchicalCollectionElementName, $this->hierarchicalElementName, $block);
		$this->items[] =& $item;
		$this->add($item);
		$this->beginningLineNo = $block->parsed->lineNo;
	}

	/**
	 * @param Hierarchical $item
	 */
	public function add(Hierarchical &$item)
	{
		$item->index = $this->length;
		$this->items[] =& $item;
		$this->length++;

        //build up if needed, then append
        if ($this->activeDepth < $item->depth)
		{
            //if it is an immediate child, add it as one
            if ($this->activeDepth + 1 == $item->depth) {
                $this->makeParent($item);
                $this->parentAtDepth()->addChild($item);
            } else {
                $emptyParents = array();
                $emptyParentsIndex = -1;
                while ($this->activeDepth <= $item->depth)
                {
                    if ($emptyParentsIndex == -1)
                    {
                        //this item already exists
                        $emptyParents[] =& $this->parentAtDepth();
                    }
                    else if ($this->activeDepth < $item->depth)
                    {
                        //this item doesn't exist
                        $emptyParents[] =& $this->parentAtDepth()->setParent($emptyParents[$emptyParentsIndex]);
                    }
                    $this->activeDepth++;
                    $emptyParentsIndex++;
                }
                $this->makeParent($item);
                $parent =& $this->parentAtDepth($item->depth - 1);
                $parent->addChild($item);
            }
		}

		//close out last parent so that another may be built separate from this one, then append
		elseif ($item->depth < $this->activeDepth)
		{
			$this->closeParents($item->depth);

			if ($item->depth == 0) {
				$this->leaders->push($item);
			}
			else
			{
				$this->parentAtDepth($item->depth)->addSibling($item);
			}
		}
		else
		{
			if ($item->index == 0)
			{
				$this->makeParent($item);
			}
			else
			{
				$this->setActiveParent($item);
			}
		}

		$this->activeDepth = $item->depth;

		$this->endingLineNo = $item->block->parsed->lineNo;
	}

	public function makeParent(Hierarchical &$parent)
	{

		if ($parent->depth == 0) {
			$this->leaders->push($parent);

			if (empty($this->parents[0])) {
				$this->parents[0] = array();
				$this->parentActive[0] = 0;
			}
			$this->parents[0][$this->parentActive[0]] =& $parent;
			return true;
		}

		if (empty($this->parents[$parent->depth]))
		{
			$this->parents[$parent->depth] = array();
			$this->parentActive[$parent->depth] = 0;
			$this->parents[$parent->depth][$this->parentActive[$parent->depth]] =& $parent;
			return true;
		}
		else if (empty($this->parents[$parent->depth][$this->parentActive[$parent->depth]]))
		{
			$this->parents[$parent->depth][$this->parentActive[$parent->depth]] =& $parent;
			return true;
		}

		return false;
	}

	public function &parentAtDepth($depth = -1)
	{
		if ($depth == -1)
		{
			$depth = $this->activeDepth;
		}

		if (!isset($this->parents[$depth]))
		{
			$item =& new Hierarchical($this->hierarchicalCollectionElementName, $this->hierarchicalElementName);
			$item->depth = $depth;
			$item->index = $this->length;
			$this->items[] = $item;
			$this->length++;
			$this->makeParent($item);
			return $item;
		}
		else if (!isset($this->parents[$depth][$this->parentActive[$depth]]))
		{
			$item =& new Hierarchical($this->hierarchicalCollectionElementName, $this->hierarchicalElementName);
			$item->depth = $depth;
			$item->index = $this->length;
			$this->items[] = $item;
			$this->length++;
			$this->makeParent($item);
			return $item;
		}
		else
		{
			$parent =& Type::Hierarchical($this->parents[$depth][$this->parentActive[$depth]]);
			return $parent;
		}
	}

	public function setActiveParent(Hierarchical &$item)
	{
		$this->parentAtDepth($item->depth)->addSibling($item);
		$this->parentActive[$item->depth]++;
		$this->makeParent($item);
	}

	public function closeParents($depth)
	{
		while ($depth < $this->activeDepth)
		{
			$this->parentActive[$this->activeDepth]++;
			$this->activeDepth--;
		}
	}

	public function render(&$parser)
	{
		return $this->leaders->render($parser);
	}
}