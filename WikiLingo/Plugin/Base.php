<?php

abstract class WikiLingo_Plugin_Base
{
	public $name;
	public $description;
	public $body;
	public $params = array();
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

	public function info()
	{
		$info = array();
		foreach ($this as $key => $param) {
			$info[$key] = $param;
		}

		return $info;
	}

	public function addParam($key, $param)
	{
		$this->params[$key] = $param;

		return $this;
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

	public function render(WikiLingo_Expression &$plugin, WikiLingo &$parser)
	{
		$this->paramDefaults($params);

		if ($this->np == true) {
			return '~np~'.$data.'~/np~';
		} else {
			return $data;
		}
	}

	function id($index = 0)
	{
		return $this->type . $index;
	}
}
