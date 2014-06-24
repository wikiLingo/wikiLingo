<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 12/10/13
 * Time: 4:22 PM
 */

namespace WikiLingo\Utilities;

use WikiLingo;

/**
 * Class Parameter
 * @package WikiLingo\Utilities
 */
class Parameter
{
	/**
	 * @var WikiLingo\Events
	 */
	public static $events = null;
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
	    if (self::$events != null) {
		    $this->label = self::$events->triggerTranslate($label, 'parameter');
	    } else {
            $this->label = $label;
	    }

        $this->value = $value;
        $this->type = ($type != null ? $type : gettype($value));
    }

	/**
	 * @param WikiLingo\Events $events
	 */
	public static function setEvents($events)
	{
		self::$events = $events;
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