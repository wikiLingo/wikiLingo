<?php
namespace WikiLingo\Expression\Tensor;

use WikiLingo\Expression\Tensor\Hierarchical;
use Types\Type;
use WikiLingo\Renderer;
use WikiLingo\Expression;

class HierarchicalCollection
{
	public $block;
	public $items = array();
	public $itemsLength = 0;

    public function __construct(Expression\Block &$block)
    {
        $this->block = $block;
    }
	public function push(Hierarchical $item)
	{
		$this->items[] =& $item;
		$this->itemsLength++;
	}

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