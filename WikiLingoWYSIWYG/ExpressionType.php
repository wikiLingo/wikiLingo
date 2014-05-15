<?php
namespace WikiLingoWYSIWYG;

use WikiLingo\Utilities;
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
	public $attribute;
	public $extraAttributes = array();

    /**
     * @param $name
     * @param $label
     * @param $example
     * @param $types
     * @param $icon
     * @param $iconClass
     * @param $group
     * @param Utilities\Parameter [$attribute]
     */
    public function __construct($name, $label, $example, $types, $icon, $iconClass, $group, $attribute = null)
    {
        $this->name = $name;
        $this->label = $label;
        $this->example = urlencode($example);
        $this->types = $types;
        $this->icon = $icon;
        $this->iconClass = $iconClass;
        $this->group = $group;
	    $this->attribute = $attribute;
    }
} 