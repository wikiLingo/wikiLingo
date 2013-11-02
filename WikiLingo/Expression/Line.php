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
	    $parent = $this->parent();

	    $element = $parser->element(__CLASS__, 'br');
	    $element->setInline();

	    if (empty($parent) || (!empty($parent) && $parent->allowsBreaks)) {
		    $line = $element->render();
            return $line . $this->parsed->text;
	    }
	    else
	    {
		    $element->classes[] = 'hidden';
		    $line = $element->render();
		    return $line . $this->parsed->text;
	    }
    }
}