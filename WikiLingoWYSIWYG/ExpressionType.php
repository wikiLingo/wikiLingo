<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 11/27/13
 * Time: 10:29 AM
 */

namespace WikiLingoWYSIWYG;


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