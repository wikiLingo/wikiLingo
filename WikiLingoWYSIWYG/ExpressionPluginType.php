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
    public $label;
    public $description;
    public $parameters;
	public $draggable;

    public function __construct($name, $parser)
    {
        $this->name = $name;
        $className = 'WikiLingo\Plugin\\' . $name;
        $class = new $className();
        $this->label = $parser->events->triggerTranslate($class->label, 'plugin');
        $this->description = $parser->events->triggerTranslate($class->description, 'plugin');
        $this->parameters = $class->parameters;
	    $this->draggable = $class->draggable;
    }
} 