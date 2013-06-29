<?php

class WikiLingo_Parameters extends WikiLingo_Parameters_Definition
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