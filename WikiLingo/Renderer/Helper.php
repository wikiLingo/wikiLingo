<?php
namespace WikiLingo\Renderer;

class Helper extends Element
{
	public $detailedAttributesClass = 'helper';

    function __construct($name)
    {
        $this->name = $name;

	    $this->detailedAttributes['data-helper'] = true;
    }
}