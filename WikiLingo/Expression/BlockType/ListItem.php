<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/27/14
 * Time: 4:31 PM
 */

namespace WikiLingo\Expression\BlockType;

use WikiLingo;
use WikiLingo\Expression;
use WikiLingo\Utilities\Tensor\Hierarchical;

class ListItem extends Hierarchical
{
    public $block = null;
    public $parsed;
    public $container;
    /**
     * @var ListItemCollection
     */
    public $children;

    /**
     * @param ListContainer $container
     * @param int $depth
     * @param Expression\Block $block
     */
    function __construct($container, Expression\Block &$block = null, $depth = 0)
    {
        $this->container = $container;
        $this->depth = $depth;

        if ($block != null) {
            $this->block =& $block;

            if (isset($block->parsed))
            {
                $this->depth = strlen($block->parsed->arguments[0]->text) - 1;
                $this->parsed = $block->parsed;
            }

        }
    }

    /**
     * @param Hierarchical $child
     * @return $this
     */
    function &addChild(Hierarchical &$child)
    {
        if (!isset($this->children))
        {
            $this->children = new ListItemCollection($this->container, $this->block);
        }

        parent::addChild($child);
        return $this;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    function render(&$renderer, &$parser)
    {

        $element = $renderer->element('WikiLingo\\Expression\\Block', 'li');

        $element->detailedAttributes["data-block-type"] = $this->container->ordered ? 'orderedListItem' : 'unorderedListItem';

        if ($this->block->isFirst && $this->parsed->text === "\n") {
            $element->detailedAttributes["data-has-line-before"] = "true";
        }
        if ($this->block->blank) {
            $element->classes[] = 'empty';
            $element->detailedAttributes["data-block-type"] = 'empty';
        }

        if (isset($this->block)) {
            if (!empty($this->block->renderedChildren)) {
                $element->staticChildren[] = $this->block->renderedChildren;
            } else if (method_exists($this->block->expression, "render")) {
                $element->staticChildren[] = $this->block->expression->render($renderer, $parser);
            }
        }

        if (isset($this->children)) {
            $element->staticChildren[] = $this->children->render($renderer, $parser);
        }

        return $element->render();
    }
} 