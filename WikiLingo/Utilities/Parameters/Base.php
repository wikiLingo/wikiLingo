<?php

namespace WikiLingo\Utilities\Parameters;

/**
 * Class Base
 * @package WikiLingo\Utilities\Parameters
 */
class Base
{
    public $parameters = array();

    /**
     * @param String $name
     * @param String $value
     */
    public function add($name, $value)
    {

        $this->parameters[$name] = $value;
    }

    /**
     * @return array
     */
    public function get()
    {
	    $parameters = $this->parameters;
	    $this->parameters = array();
        return $parameters;
    }
}