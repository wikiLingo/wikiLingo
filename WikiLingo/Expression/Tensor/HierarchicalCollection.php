<?php
namespace WikiLingo\Expression\Tensor;

use WikiLingo\Expression\Tensor\Hierarchical;
use Types\Type;
use WikiLingo\Renderer;

class HierarchicalCollection
{
	public $block;
	public $parser;
	public $elementName;
	public $items = array();
	public $itemsLength = 0;

	public function __construct($elementName)
	{
		$this->elementName = $elementName;
	}

	public function push(Hierarchical $item)
	{
		$this->items[] =& $item;
		$this->itemsLength++;
	}

	public function render(&$parser)
	{
        $element = $parser->element('test', $this->elementName);
		foreach($this->items as $item)
		{
			$element->staticChildren[] = Type::Hierarchical($item)->render($parser);
		}
		return $element->render();
	}
}