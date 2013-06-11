<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: DynamicVariables.php 44444 2013-01-05 21:24:24Z changi67 $

class JisonParser_Wiki_DynamicVariables
{
	public $parser;
	static $dynamicVariables = array();

	function __construct(&$parser)
	{
		$this->parser = &$parser;
	}

	private function get( $name, $lang = null )
	{
		global $tikilib;

		if (isset(self::$dynamicVariables[$name])) {
			return self::$dynamicVariables[$name];
		}

		$result = $tikilib->table('tiki_dynamic_variables')->fetchAll(array('data', 'lang'), array('name' => $name));

		$value = "NaV";

		foreach ( $result as $row ) {
			if ( $row['lang'] == $lang ) {
				// Exact match
				return $row['data'];
			} elseif ( empty( $row['lang'] ) ) {
				// Universal match, keep in case no exact match
				$value = $row['data'];
			}
		}

		self::$dynamicVariables[$name] = $value;

		return $value;
	}

	function ui($name, $lang, $isDouble = false)
	{
		global $tiki_p_edit_dynvar;

		$value = $this->get($name);
		$type = ($isDouble == true ? "doubleDynamicVar" : "singleDynamicVar");

		if (isset($tiki_p_edit_dynvar) && $tiki_p_edit_dynvar == 'y') {
			$span1 = "<span  style='display:inline;' id='dyn_".$name."_display'><a class='dynavar' onclick='javascript:toggle_dynamic_var(\"$name\");' title='".tra('Click to edit dynamic variable', '', true).": $name'>$value</a></span>";
			$span2 = "<span style='display:none;' id='dyn_".$name."_edit'><input type='text' name='dyn_".$name."' value='".$value."' />".'<input type="submit" name="_dyn_update" value="'.tra('Update variables', '', true).'"/></span>';
		} else {
			$span1 = "<span class='dynavar' style='display:inline;' id='dyn_".$name."_display'>$value</span>";
			$span2 = '';
		}

		return $this->parser->createWikiHelper($type, "span", $span1 . $span2);
	}

	function makeForum(&$input)
	{
		if (!empty(self::$dynamicVariables)) {
			$input = '<form method="post" name="dyn_vars">'."\n".$input.'</form>';
		}
	}
}