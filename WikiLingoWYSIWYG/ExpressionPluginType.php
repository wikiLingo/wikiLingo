<?php

namespace WikiLingoWYSIWYG;

/**
 * Class ExpressionPluginType
 * @package WikiLingoWYSIWYG
 */
class ExpressionPluginType
{
    public $name;
    public $label;
    public $description;
    public $parameters;
	public $draggable;

    /**
     * @param $name
     * @param $parser
     */
    public function __construct($name, $parser)
    {
        $this->name = $name;
        $className = 'WikiLingo\Plugin\\' . $name;
        $class = new $className();
        $this->label = $parser->events->triggerTranslate($class->label, 'plugin');
        $this->description = $parser->events->triggerTranslate($class->description, 'plugin');
        $this->parameters = (empty($class->parameters) ? null : $class->parameters);
	    $this->draggable = $class->draggable;
    }
} 