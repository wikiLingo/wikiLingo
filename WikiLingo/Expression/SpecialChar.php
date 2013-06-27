<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: SpecialChar.php 44444 2013-01-05 21:24:24Z changi67 $

class WikiLingo_Expression_SpecialChar
{
	public $parser;

	function __construct(&$parser)
	{
		$this->parser = $parser;
	}

	//This var is used in both protectSpecialChars and unprotectSpecialChars to simplify the html ouput process
	public $specialChars = array(
		'≤REAL_LT≥' => array(
			'html'=>		'<',
			'nonHtml'=>		'&lt;'
		),
		'≤REAL_GT≥' => array(
			'html'=>		'>',
			'nonHtml'=>		'&gt;'
		),
		'≤REAL_NBSP≥' => array(
			'html'=>		'&nbsp;',
			'nonHtml'=>		'&nbsp;'
		),
		/*on post back the page is parsed, which turns & into &amp;
		this is done to prevent that from happening, we are just
		protecting some chars from letting the parser nab them*/
		'≤REAL_AMP≥' => array(
			'html'=>		'& ',
			'nonHtml'=>		'& '
		),
	);

	/**
	 * used to protect special characters temporarily, so that they cannot be decoded or encoded.  Later we can
	 * unprotect them to what they were or to an alternate character
	 *
	 * @access  public
	 * @param   string  $input unparsed syntax
	 * @return  string  $input protected
	 */
	public function protect($input)
	{
		if (
			$this->parser->isHtmlPurifying == true ||
			$this->parser->getOption('is_html') == false
		) {
			foreach ($this->specialChars as $key => $specialChar) {
				$input = str_replace($specialChar['html'], $key, $input);
			}
		}

		return $input;
	}

	/**
	 * used to unprotect special characters possibly with an alternate character
	 *
	 * @access  public
	 * @param   string  $input unparsed syntax
	 * @param   bool  $is_html true for html context, false for non-html context
	 * @return  string  $input protected
	 */
	public function unprotect($input, $is_html = false)
	{
		if (
			$is_html == true ||
			$this->parser->getOption('is_html') == true
		) {
			foreach ($this->specialChars as $key => $specialChar) {
				$input = str_replace($key, $specialChar['html'], $input);
			}
		} else {
			foreach ($this->specialChars as $key => $specialChar) {
				$input = str_replace($key, $specialChar['nonHtml'], $input);
			}
		}

		return $input;
	}
}