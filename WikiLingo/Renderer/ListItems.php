<?php
/**
 * @namespace
 */
namespace WikiLingo\Renderer;
use WikiLingo;
use WikiLingo\Expression;

/**
 * @constructor
 */
class ListItems extends Element
{
    public $modifierUsed = false;
    public static $listModifiers = array(
        '-' => 'Toggle'
    );

    public function render(&$parser, Expression\Tensor\Hierarchical &$items)
    {
        $element = $parser->element(__CLASS__, 'ul');
	    $renderClass = $items->renderClass;
	    $element->staticChildren[] = $renderClass::render($parser, $items);
        foreach ($items->children as &$child)
        {
            $element->staticChildren[] = $renderClass::render($parser, $child);
        }

        return $element->render();
    }
}