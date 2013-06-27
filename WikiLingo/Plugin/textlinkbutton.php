<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
// 
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: textlinkbutton.php 44444 2013-01-05 21:24:24Z changi67 $

class WikiPlugin_textlinkbutton extends WikiLingo_Plugin_HtmlBase
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
