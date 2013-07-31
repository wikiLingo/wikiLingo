<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Line extends Base
{
    function render(&$parser)
    {
	    $parent = $this->parent();

	    if (empty($parent) || (!empty($parent) && $parent->allowsBreaks)) {
		    $element = new WikiLingo\Element('br');
		    $element->setInline();
		    $line = $element->render();
            return $line . $this->parsed->text;
	    }

	    return $this->parsed->text;
    }
}