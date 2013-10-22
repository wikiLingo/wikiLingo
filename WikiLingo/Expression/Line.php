<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Line extends Base
{
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