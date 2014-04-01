<?php
namespace WikiLingo\Utilities\Tensor;

use WikiLingo\Renderer;
use WikiLingo\Expression;

/**
 * Class HierarchicalCollection
 * @package WikiLingo\Expression\Tensor
 */
class HierarchicalCollection
{
    /**
     * @var Hierarchical[]
     */
    public $items = array();

    /**
     * @var int
     */
    public $itemsLength = 0;

    /**
     * @param Hierarchical $item
     */
    public function push(Hierarchical $item)
	{
		$this->items[] =& $item;
		$this->itemsLength++;
	}
}