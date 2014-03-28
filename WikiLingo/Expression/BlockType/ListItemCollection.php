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
use WikiLingo\Renderer\Element;

class ListItemCollection extends Tensor\HierarchicalCollection
{
    /**
     * @var \WikiLingo\Expression\Block
     */
    public $block;
    public $container;

    /**
     * @param ListContainer $container
     * @param Expression\Block $block
     */
    public function __construct($container, Expression\Block &$block)
    {
        $this->container = $container;
        $this->block = $block;
    }

    /**
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render($parser)
    {
        $element = $parser->element('WikiLingo\\Expression\\Block', $this->container->ordered ? 'ol' : 'ul');
        $element->detailedAttributes['data-parent'] = 'true';
        foreach($this->items as $item)
        {
            $element->staticChildren[] = $item->render($parser);
        }
        return $element->render();
    }
} 