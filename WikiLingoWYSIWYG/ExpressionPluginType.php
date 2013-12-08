<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/27/13
 * Time: 11:46 AM
 */

namespace WikiLingoWYSIWYG;


class ExpressionPluginType
{
    public $name;
    public $parameters;
    public $advancedParameters;
	public $draggable;

    public function __construct($name)
    {
        $this->name = $name;
        $className = 'WikiLingo\Plugin\\' . $name;
        $class = new $className();
        $this->parameters = $class->parameters;
	    $this->draggable = $class->draggable;
    }
} 