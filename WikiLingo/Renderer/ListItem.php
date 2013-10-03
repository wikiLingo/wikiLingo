<?php

namespace WikiLingo\Renderer;
use WikiLingo;

class ListItem extends Element
{
	public static $listTypes = array(
		'+' => "Break",
		'*' => "Unordered",
		'#' => "Ordered",
		';' => "Definition"
	);

	public function render(&$parser, WikiLingo\Expression\Tensor\Hierarchical &$items)
	{
		$element = $parser->element(__CLASS__, 'li');
		$renderClass = $items->renderClass;
		$element->staticChildren[] = $renderClass::render($parser, $items);
        foreach ($items->children as &$child)
        {
            $element->staticChildren[] = $renderClass::render($parser, $child);
        }
        return $element->render();
	}
}
