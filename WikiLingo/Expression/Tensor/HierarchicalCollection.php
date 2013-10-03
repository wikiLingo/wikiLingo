<?php
namespace WikiLingo\Expression\Tensor;

use WikiLingo\Expression\Tensor\Hierarchical;
use Types\Type;
use WikiLingo\Renderer;

class HierarchicalCollection
{
	public $block;
	public $parser;
	public $element;
	public $elementName;
	public $items = array();
	public $itemsLength = 0;

	public function __construct($elementName)
	{
		$this->elementName = $elementName;
		$this->element = new Renderer\Element(__CLASS__, $this->elementName);
	}

	public function push(Hierarchical $item)
	{
		$this->items[] =& $item;
		$this->itemsLength++;
	}

	public function render(&$parser)
	{
		foreach($this->items as $item)
		{
			$this->element->staticChildren[] = Type::Hierarchical($item)->render($parser);
		}
		return $this->element->render();
	}
}