<?php
namespace WikiLingo\Plugin;

use WikiLingo;

abstract class Base
{
	public $name;
	public $inlineOnly = false;
	public $parameters = array();
	public $attributes = array();
    public $privateAttributes = array();
	public $type;
	public $tags = array( 'basic' );
	public $permissible = true;
    public $wysiwygTagType = 'span';

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

	public abstract function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser);
}
