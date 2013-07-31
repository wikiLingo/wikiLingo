<?php
namespace WikiLingo\Expression;

use WikiLingo;

class Line
{
    public $parsed;
	function __construct(WikiLingo\Parsed & $parsed)
	{
        $this->parsed =& $parsed;
	}

    function render(&$parser)
    {
	    $element = new WikiLingo\Element('br');
	    $line = $element->render();
        return $line;
    }
}