<?php
namespace WikiLingo\Expression;

/**
 * Class DescriptionList
 * @package WikiLingo\Expression
 */
class DescriptionList
{
	public $parsed;
	public $parser;
	public $block;
	public $items = array();

    /**
     * @param Block $block
     */
    public function __construct(Block &$block)
	{
		$this->parsed =& $block->parsed;
		$this->block =& $block;
		$termSet = false;
		$term = '';
		$description = '';

		foreach($this->parsed->children as $child) {
			if ($child->text == ':' && $termSet == false) {
				$termSet = true;
			} else if ($termSet == false) {
				$term .= $child->text;
			} else {
				$description .= $child->text;
			}
		}

		$this->items[] = new DescriptionListItem($term, $description);
		$this->parser =& $this->parsed->parser;
		$this->parser->addType(__CLASS__, $this);
	}

    /**
     * @param Block $block
     */
    public function add(Block &$block)
	{
		$termSet = false;
		$term = '';
		$description = '';

		foreach($block->parsed->children as $child) {
			if ($child->text == ':' && $termSet == false) {
				$termSet = true;
			} else if ($termSet == false) {
				$term .= $child->text;
			} else {
				$description .= $child->text;
			}
		}

		$this->items[] = new DescriptionListItem($term, $description);
	}

    /**
     * @return mixed
     */
    public function render()
	{
		$element = $this->parser->element(__CLASS__, 'dl');

		foreach ($this->items as $item) {
			$element->staticChildren[] = $item->render($this->parser);
		}

		return $element->render();
	}
}