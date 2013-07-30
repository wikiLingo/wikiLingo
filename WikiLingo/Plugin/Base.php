<?php
namespace WikiLingo\Plugin;

abstract class Base
{
	public $name;
	public $description;
	public $body;
	public $params = array();
	public $attributes = array();
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

	public function addParam($key, $param)
	{
		$this->params[$key] = $param;

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

    protected function paramDefaults(&$params)
    {
        $defaults = array();
        foreach ($this->params as $param => $setting) {
            if (!empty($setting)) {
                $defaults[$param] = $setting;
            }
        }

        $params = array_merge($defaults, $params);
    }

	public function render(&$plugin, &$parser)
	{
		$this->paramDefaults($params);

		if ($this->np == true) {
		//	return '~np~'.$data.'~/np~';
		} else {
		//	return $data;
		}
	}

	function id($index = 0)
	{
		return $this->type . $index;
	}
}
