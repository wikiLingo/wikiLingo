<?php

namespace WikiLingo\Utilities\Parameters;

class Base
{
    public $parameters = array();

    public function add($name, $value)
    {
        $this->parameters[$name] = htmlspecialchars($value);
    }

    public function get()
    {
	    $parameters = $this->parameters;
	    $this->parameters = array();
        return $parameters;
    }
}