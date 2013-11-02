<?php
namespace WikiLingoWYSIWYG\Renderer;
use WikiLingo;

class Element extends WikiLingo\Renderer\Element
{
    public function __construct($type, $name)
    {
        parent::__construct($type, $name);
        $this->detailedAttributes["data-element"] = 'true';
        $this->useDetailedAttributes = true;
        $this->detailedAttributes['data-type'] = $type;
    }
}