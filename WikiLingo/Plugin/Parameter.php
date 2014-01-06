<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 12/10/13
 * Time: 4:22 PM
 */

namespace WikiLingo\Plugin;

/**
 * Class Parameter
 * @package WikiLingo\Plugin
 */
class Parameter
{
    public $label;
    public $value;
    public $type;

    /**
     * @param $label
     * @param $value
     * @param null $type
     */
    public function __construct($label, $value, $type = null)
    {
        $this->label = $label;
        $this->value = $value;
        $this->type = (isset($type) ? $type : gettype($value));
    }

    /**
     * @return string
     */
    public function filter()
    {
        switch ($this->type) {
            case "boolean":     return ($this->value ? 'true' : 'false');


            case "integer":     return $this->value * 1;
            case "double":      return $this->value * 1;
            case "string":      return strip_tags($this->value);
            case "array":       return implode(',', $this->value);
            case "object":
            case "resource":
            case "NULL":
                return '';
        }
    }
} 