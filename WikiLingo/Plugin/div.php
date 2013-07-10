<?php


class WikiLingo_Plugin_div extends WikiLingo_Plugin_HtmlBase
{
	public $type = 'div';
    public $htmlTagType = 'div';
    public $wysiwygTagType = 'div';
	public $documentation = 'PluginDIV';
	public $validate = 'all';
	public $filter = 'rawhtml_unsafe';
	public $icon = 'img/icons/mime/html.png';
	public $tags = array( 'basic' );

	function __construct()
	{
		$this->name = tra('HTML (Object Oriented) version, for proof of concept');
		$this->description = tra('Add HTML to a page');
		$this->body = tra('HTML code');
		$this->params = array(
			'wiki' => array(
				'required' => false,
				'name' => tra('Wiki Syntax'),
				'description' => tra('Parse wiki syntax within the HTML code.'),
				'options' => array(
					array('text' => '', 'value' => ''),
					array('text' => tra('No'), 'value' => 0),
					array('text' => tra('Yes'), 'value' => 1),
				),
				'filter' => 'int',
				'default' => '0',
			),
		);
	}
}
