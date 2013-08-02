<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Line extends Base
{
    function render(&$parser)
    {
	    $parent = $this->parent();

	    if (empty($parent) || (!empty($parent) && $parent->allowsBreaks)) {
		    $element = $parser->element(__CLASS__, 'br');
		    $element->setInline();
		    $line = $element->render();
            return $line . $this->parsed->text;
	    }

	    return $this->parsed->text;
    }
}