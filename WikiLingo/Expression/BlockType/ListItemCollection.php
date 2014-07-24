<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/27/14
 * Time: 4:31 PM
 */

namespace WikiLingo\Expression\BlockType;

use WikiLingo;
use WikiLingo\Utilities\Tensor;
use WikiLingo\Expression;
use WikiLingo\Model\Element;

class ListItemCollection extends Tensor\HierarchicalCollection
{
    /**
     * @var \WikiLingo\Expression\Block
     */
    public $block;
    public $container;
    /**
     * @var \WikiLingo\Expression\BlockType\ListItem[]
     */
    public $items;

    /**
     * @param ListContainer $container
     * @param Expression\Block $block
     */
    public function __construct($container, $block)
    {
        $this->container = $container;
        $this->block = $block;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render($renderer, $parser)
    {
        foreach($this->container->listItemCollectionRenderDelegate as $delegate)
        {
            return $delegate($this->items, $renderer, $parser);
        }
        return '';
    }
} 