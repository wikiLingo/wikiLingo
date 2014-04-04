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
    public $listItemCollectionRenderDelegate = array();
    public $listItemRenderDelegate = array();

    /**
     * @param Block $block
     * @param bool $ordered
     */
    public function __construct(&$block, $ordered)
    {
        /**
         * setup default rendering delegates
         *
         * @param ListItemCollection $listItems
         * @param WikiLingo\Renderer $renderer
         * @param WikiLingo\Parser $parser
         * @return string
         */
        $this->listItemCollectionRenderDelegate[] = function(&$listItems, &$renderer, &$parser) {
            $element = $renderer->element('WikiLingo\\Expression\\Block', $this->ordered ? 'ol' : 'ul');
            $element->detailedAttributes['data-parent'] = 'true';
            foreach($listItems as $listItem)
            {
                $element->staticChildren[] = $listItem->render($renderer, $parser);
            }
            return $element->render();
        };

        /**
         * @param ListItem $listItem
         * @param WikiLingo\Renderer $renderer
         * @param WikiLingo\Parser $parser
         * @return string
         */
        $this->listItemRenderDelegate[] = function(&$listItem, &$renderer, &$parser) {
            $element = $renderer->element('WikiLingo\\Expression\\Block', 'li');

            $element->detailedAttributes["data-block-type"] = $this->ordered ? 'orderedListItem' : 'unorderedListItem';

            $block = $listItem->block;
            $parsed = $listItem->parsed;

            if ($block->isFirst && $parsed->text === "\n") {
                $element->detailedAttributes["data-has-line-before"] = "true";
            }
            if ($block->blank) {
                $element->classes[] = 'empty';
                $element->detailedAttributes["data-block-type"] = 'empty';
            }

            if (isset($block)) {
                if (!empty($block->renderedChildren)) {
                    $element->staticChildren[] = $block->renderedChildren;
                } else if (method_exists($block->expression, "render")) {
                    $element->staticChildren[] = $block->expression->render($renderer, $parser);
                }
            }

            if (isset($listItem->children)) {
                $element->staticChildren[] = $listItem->children->render($renderer, $parser);
            }

            return $element->render();
        };

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
    public function add(&$item)
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