<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: ConditionBase.php 44593 2013-01-23 12:15:24Z jonnybradley $

abstract class WikiPlugin_ConditionBase
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

	abstract protected function output(&$data, &$params, &$index, &$parser);

	public function exec($data, $params, $index, &$parser)
	{
		$this->paramDefaults($params);

		// strip out sanitisation which may have occurred when using nested plugins
		$data = str_replace('<x>', '', $data);
		$data = $this->output($data, $params, $index, $parser);

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
