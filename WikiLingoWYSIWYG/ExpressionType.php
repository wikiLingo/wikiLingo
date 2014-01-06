<?php
namespace WikiLingoWYSIWYG;

/**
 * Class ExpressionType
 * @package WikiLingoWYSIWYG
 */
class ExpressionType
{
    public $name;
    public $label;
    public $example;
    public $types;
    public $icon;
    public $iconClass;
    public $group;
	public $extraAttributes = array();

    /**
     * @param $name
     * @param $label
     * @param $example
     * @param $types
     * @param $icon
     * @param $iconClass
     * @param $group
     */
    public function __construct($name, $label, $example, $types, $icon, $iconClass, $group)
    {
        $this->name = $name;
        $this->label = $label;
        $this->example = urlencode($example);
        $this->types = $types;
        $this->icon = $icon;
        $this->iconClass = $iconClass;
        $this->group = $group;
    }
} 