<?php

namespace WikiLingo\Plugin\Parameters;

class Base
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