<?php
namespace WikiLingo\Plugin;

class textlinkbutton extends HtmlBase
{
	public $type = 'textlinkbutton';
	public $documentation = '';
	public $prefs = array('feature_wiki', 'wikiplugin_textlink', 'feature_forwardlinkprotocol');
	public $filter = 'rawhtml_unsafe';
	public $icon = 'img/icons/mime/html.png';
	public $tags = array( 'basic' );
	public $htmlTagType = 'span';
	public $htmlAttributes = array(
		"class" => "textLinkCreationButton"
	);

	function __construct()
	{
		$this->name = tra('A TextLink Button');
		$this->description = tra('A TextLink Button');
		$this->body = tra('NA');
		$this->params = array();
	}

	function output(&$data, &$params, &$index, &$parser)
	{
		global $page;

		if (isset($page)) {
			return '<a href"#" onclick="return false;">' . tr('Create TextLink') . '</a>';
		}
	}
}
