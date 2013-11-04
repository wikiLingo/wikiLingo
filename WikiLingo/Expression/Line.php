<?php
namespace WikiLingo\Expression;

use Types\Type;
use WikiLingo;

class Line extends Base
{
    //Type::Block($this->parser->blocks[$this->parser->blocksLength - 1])
    function __construct(WikiLingo\Parsed &$parsed)
    {
        $this->parsed =& $parsed;

        //If we are not in a plugin, and there are blocks, go ahead and close them so no more can be added
        $parser =& $parsed->parser;
        if ($parser->pluginStackCount == 0 && $parser->blocksLength > 0) {
            $block =& Type::Block($parser->blocks[$parser->blocksLength - 1]);
            $block->open = false;
        }
    }

    function render(&$parser)
    {

	    $allowLines = true;
	    if ($parent = $this->parent()) {
		    $allowLines = $parent->expression->allowLines;
	    }

	    $element = Type::Element($parser->element(__CLASS__, 'br'));
	    $element->setInline();
	    if ($previousSibling = $this->parsed->previousSibling()) {
		    if ($previousSibling->expression->allowLineAfter == false && empty($parser->wysiwyg)) {
			    return '';
		    }
	    } else if ($allowLines) {

	    }

	    if ($allowLines == false)
	    {
		    //Type::Scripts($parser->scripts)->addCss("br.hidden {display: none;}");
		    $element->classes[] = 'hidden';
	    }

	    $line = $element->render();
	    return $line;
    }
}