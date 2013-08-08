<?php
namespace WikiLingo\Plugin;

use WikiLingo;

abstract class Base
{
	public $name;
	public $description;
	public $body;
	public $parameters = array();
	public $attributes = array();
    public $privateAttributes = array();
	public $type;
	public $documentation;
	public $prefs = array();
	public $parserLevel = 0;
	public $format;
	public $validate;
	public $filter = 'rawhtml_unsafe';
	public $icon = 'img/icons/mime/html.png';
	public $tags = array( 'basic' );
	public $np = true;
    public $wysiwygTagType = 'span';

    public static $scripts;

	public function info()
	{
		$info = array();
		foreach ($this as $key => $param) {
			$info[$key] = $param;
		}

		return $info;
	}

    public function getParent( &$plugin )
    {
        if (isset($plugin->parent)) {
            return $plugin->parent;
        } else {
            return null;
        }
    }

	public function addParameter($key, $param)
	{
		$this->parameters[$key] = $param;

		return $this;
	}

	protected function attributeDefaults(&$attributes)
	{
		$defaults = array();
		foreach ($this->attributes as $param => $setting) {
			if (!empty($setting)) {
                $defaults[$param] = $setting;
			}
		}

        $attributes = array_merge($defaults, $attributes);
	}

    protected function parameterDefaults(&$parameters)
    {
        $defaults = array();
        foreach ($this->parameters as $param => $setting) {
            if (!empty($setting)) {
                $defaults[$param] = $setting;
            }
        }

	    $parameters = array_merge($defaults, $parameters);
    }

	public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
	{
		$this->parameterDefaults($plugin->parameters);

		//Todo: Need a wrapper for WYSIWYG
		return $body;
	}

	function id($index = 0)
	{
		return $this->type . $index;
	}

    function __construct()
    {
        if (is_null(self::$scripts)) {
            self::$scripts = new WikiLingo\Utilities\Scripts();
        }
    }
}
