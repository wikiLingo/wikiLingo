<?php
namespace WikiLingo\Renderer;

class Helper extends Element
{
    function __construct($name)
    {
        $this->name = $name;

	    if (end(self::$parserTypeStack) == 'WYSIWYGWikiLingo') {
	        $this->classes[] = 'wl-helper';
	    }
    }
}