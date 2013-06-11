<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: AutoLink.php 44444 2013-01-05 21:24:24Z changi67 $

class JisonParser_Wiki_AutoLink
{
	public $parser;

	private $icon = '';
	private $attr = '';
	private $rules = array(

	);

	function __construct(&$parser)
	{
		global $smarty, $prefs;

		$this->parser = &$parser;

		if ($prefs['popupLinks'] == 'y')
			$this->attr .= 'target="_blank" ';
		if ($prefs['feature_wiki_ext_icon'] == 'y') {
			$this->attr .= 'class="wiki external" ';
			include_once('lib/smarty_tiki/function.icon.php');
			$this->icon = smarty_function_icon(array('_id'=>'external_link', 'alt'=>tra('(external link)'), '_class' => 'externallink', '_extension' => 'gif', '_defaultdir' => 'img/icons', 'width' => 15, 'height' => 14), $smarty);
		} else {
			$this->attr .= 'class="wiki" ';
		}
	}

	public function parse(&$text) //TODO: needs to be handled with wiki tag creator
	{
		global $tikilib, $prefs;

		$patterns = array();
		$replacements = array();

		//match prefix://suffix
		$patterns[] = "#([\n ])([a-z0-9]+?)://([^<, \n\r]+)#i";
		$replacements[] = "\\1<a " . $this->attr . " href=\"\\2://\\3\">\\2://\\3" . $this->icon . "</a>";

		//match www.prefix.suffix/optionalpath
		$patterns[] = "#([\n ])www\.([a-z0-9\-]+)\.([a-z0-9\-.\~]+)((?:/[^,< \n\r]*)?)#i";
		$replacements[] = "\\1<a " . $this->attr . " href=\"http://www.\\2.\\3\\4\">www.\\2.\\3\\4" . $this->icon . "</a>";

		//match prefix@suffix
		$patterns[] = "#([\n ])([a-z0-9\-_.]+?)@([\w\-]+\.([\w\-\.]+\.)*[\w]+)#i";
		if ($prefs['feature_wiki_protect_email'] == 'y') {
			$replacements[] = "\\1" . $tikilib->protect_email("\\2", "\\3");
		} else {
			$replacements[] = "\\1<a class='wiki' href=\"mailto:\\2@\\3\">\\2@\\3</a>";
		}

		//magnet link
		$patterns[] = "#([\n ])magnet\:\?([^,< \n\r]+)#i";
		$replacements[] = "\\1<a class='wiki' href=\"magnet:?\\2\">magnet:?\\2</a>";

		$text = preg_replace($patterns, $replacements, $text);
	}
}