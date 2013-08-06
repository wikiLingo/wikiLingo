<?php
namespace WikiLingoWYSIWYG\Renderer;

use WikiLingo;

class Element extends WikiLingo\Renderer\Element
{
    public $classes = array('wl-element');

    function __construct($type, $name)
    {
        $this->attributes['data-type'] = $type;
        parent::__construct($type, $name);
    }

}