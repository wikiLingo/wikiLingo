<?php
namespace WikiLingo\Expression;

class DescriptionList
{
	public $parsed;
	public $parser;
	public $block;
	public $items = array();

	public function __construct(Block &$block)
	{
		$this->parsed =& $block->parsed;
		$this->block =& $block;
		if ($this->parsed->childrenLength > 2) {
			$this->items[] = new DescriptionListItem($this->parsed->children[0]->text, $this->parsed->children[2]->text);
		}
		$this->parser =& $this->parsed->parser;
		$this->parser->addType(__CLASS__, $this);
	}

	public function add(Block &$block)
	{
		if ($block->parsed->childrenLength > 2) {
			$this->items[] = new DescriptionListItem($block->parsed->children[0]->text, $block->parsed->children[2]->text);
		}
	}

	public function render()
	{
		$element = $this->parser->element(__CLASS__, 'dl');

		foreach ($this->items as $item) {
			$element->staticChildren[] = $item->render($this->parser);
		}

		return $element->render();
	}
}