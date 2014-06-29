<?php
namespace WikiLingo\Utilities\Tensor;

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
    public function push($item)
	{
		$this->items[] = $item;
		$this->itemsLength++;
	}
}