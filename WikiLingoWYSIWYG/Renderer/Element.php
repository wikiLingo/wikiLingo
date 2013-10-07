<?php
namespace WikiLingoWYSIWYG\Renderer;
use WikiLingo;

class Element extends WikiLingo\Renderer\Element
{
    public function __construct($type, $name)
    {
        parent::__construct($type, $name);
        $this->classes[] = 'wl-element';
        $this->useDetailedAttributes = true;
        $this->attributes['data-type'] = $type;
    }
}