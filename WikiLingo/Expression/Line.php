<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Line
 * @package WikiLingo\Expression
 */
class Line extends Base
{
    /**
     * @param WikiLingo\Parsed $parsed
     */
    function __construct(WikiLingo\Parsed $parsed)
    {
        $this->parsed = $parsed;

        //If we are not in a plugin, and there are blocks, go ahead and close them so no more can be added
        $parser = $parsed->parser;
        if ($parser->pluginStackCount == 0 && $parser->blocksLength > 0) {
            $block = $parser->blocks[$parser->blocksLength - 1];
            $block->open = false;
        }
    }


    function render($renderer, $parser)
    {

	    $allowLines = true;
	    if ($parent = $this->parent()) {
            $parentExpression = $parent->expression;
		    $allowLines = $parentExpression->allowLines;
	    }

	    $element = $renderer->element(__CLASS__, 'br');
	    $element->setInline();
	    if ($previousSibling = $this->parsed->previousSibling()) {
		    if ($previousSibling->expression->allowLineAfter == false && empty($parser->wysiwyg)) {
			    return '';
		    }
	    } else if ($allowLines) {

	    }

	    if ($allowLines == false)
	    {
		    $parser->scripts->addCss("br.hidden {display: none;content: ' '}");
		    $element->classes[] = 'hidden';
	    }

	    $line = $element->render();
	    return $line;
    }
}