<?php
namespace WikiLingo\Expression\Tensor;

use WikiLingo\Expression\Tensor\Hierarchical;
use Types\Type;
use WikiLingo\Renderer;
use WikiLingo\Expression;

/**
 * Class HierarchicalCollection
 * @package WikiLingo\Expression\Tensor
 */
class HierarchicalCollection
{
	public $block;
	public $items = array();
	public $itemsLength = 0;

    /**
     * @param Expression\Block $block
     */
    public function __construct(Expression\Block &$block)
    {
        $this->block = $block;
    }

    /**
     * @param Hierarchical $item
     */
    public function push(Hierarchical $item)
	{
		$this->items[] =& $item;
		$this->itemsLength++;
	}

    /**
     * @return string
     */
    public function render()
	{
        $element = $this->block->collectionElement();
		foreach($this->items as $item)
		{
			$element->staticChildren[] = Type::Hierarchical($item)->render();
		}
		return $element->render();
	}
}