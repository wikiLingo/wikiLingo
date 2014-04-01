<?php

namespace WikiLingo\Expression\BlockType;

use WikiLingo;
use WikiLingo\Expression\Block;
use WikiLingo\Utilities\Tensor;

class ListContainer extends Tensor\Flat
{
    /**
     * @var \WikiLingo\Expression\Block
     * set from the parent
     */
    public $block;

    /**
     * @var WikiLingo\Parser
     */
    public $parser;
    public $beginningLineNo;
    public $endingLineNo;
    public $ordered = false;

    /**
     * @param Block $block
     * @param bool $ordered
     */
    public function __construct(Block &$block, $ordered)
    {
        $this->block =& $block;
        $this->ordered = $ordered;
        $this->parser =& $block->parser;
        $this->leaders = new ListItemCollection($this, $block);
        $item = new ListItem($this, $block, 0);
        $this->items[] =& $item;
        $this->add($item);
        $this->beginningLineNo = $block->parsed->lineNo;
    }

    /**
     * @param ListItem $item
     */
    public function add(ListItem &$item)
    {
        parent::add($item);

        $this->endingLineNo = $item->block->parsed->lineNo;
    }

    /**
     * @param int $depth
     * @param int $index
     * @return ListContainer
     */
    public function newEmptyParentAtDepth($depth, $index)
    {
        $this->parser->scripts->addCss(<<<CSS
li.empty {
    list-style-type: none ! important;
}
CSS

        );
        $block = new Block();
        $block->blank = true;
        $item = new ListItem($this, $block, $depth);
        $item->index = $index;
        return $item;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(&$renderer, &$parser)
    {
        return $this->leaders->render($renderer, $parser);
    }
}