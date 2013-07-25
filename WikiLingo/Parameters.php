<?php

namespace WikiLingo;
use WikiLingo;

class Parameters extends WikiLingo\Parameters\Definition
{
    public $parameters = array();

    public function add($name, $value)
    {
        $this->parameters[$name] = $value;
    }

    public function get()
    {
	    $parameters = $this->parameters;
	    $this->parameters = array();
        return $parameters;
    }
}