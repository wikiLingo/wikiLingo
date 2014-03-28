<?php
namespace WikiLingo\Utilities\Tensor;

use WikiLingo;
use WikiLingo\Expression\Block;

/**
 * A flat manages the creation of the Hierarchical items.  There is only one flat for a Hierarchical group.
 * Class Flat
 * @package WikiLingo\Expression\Tensor
 */
abstract class Flat
{
	/**
	 * @var HierarchicalCollection
	 */
	public $leaders;

	/**
	 * @var int
	 */
	public $activeDepth = 0;

	/**
	 * @var Hierarchical[]
	 */
	public $items = array();

	/**
	 * @var Hierarchical[][]
	 */
	public $parents = array();

	/**
	 * @var int[]
	 */
	public $parentActive = array();
	public $length = 0;


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
	}

    /**
     * @param Hierarchical $parent
     * @return bool
     */
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

    /**
     * @param int $depth
     * @param int $index
     * @return Hierarchical
     */
    public function newEmptyParentAtDepth($depth, $index)
    {
        $item = new Hierarchical();
        $item->depth = $depth;
        $item->index = $index;
        return $item;
    }

    /**
     * @param Number $depth
     * @return Hierarchical
     */
    public function &parentAtDepth($depth = -1)
	{
		if ($depth == -1)
		{
			$depth = $this->activeDepth;
		}

		if (!isset($this->parents[$depth]))
		{
            $item = $this->newEmptyParentAtDepth($depth, $this->length);
            $this->items[] = $item;
            $this->length++;
            $this->makeParent($item);
            return $item;
		}

		else if (!isset($this->parents[$depth][$this->parentActive[$depth]]))
		{

            $item = $this->newEmptyParentAtDepth($depth, $this->length);
			$this->items[] = $item;
			$this->length++;
			$this->makeParent($item);
			return $item;
		}

		else
		{
			$parent = $this->parents[$depth][$this->parentActive[$depth]];
			return $parent;
		}
	}

    /**
     * @param Hierarchical $item
     */
    public function setActiveParent(Hierarchical &$item)
	{
		$this->parentAtDepth($item->depth)->addSibling($item);
		$this->parentActive[$item->depth]++;
		$this->makeParent($item);
	}

    /**
     * @param Number $depth
     */
    public function closeParents($depth)
	{
		while ($depth < $this->activeDepth)
		{
			$this->parentActive[$this->activeDepth]++;
			$this->activeDepth--;
		}
	}
}