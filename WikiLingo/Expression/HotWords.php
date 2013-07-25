<?php

namespace WikiLingo\Expression;

class HotWords
{
	public $parser;
	static public $hotWords = array();

	function __construct(&$parser)
	{
		global $tikilib;

		$this->parser = &$parser;
	}

	function parse(&$content) //TODO: needs handled with wiki tag creator
	{
		global $prefs;
		$hotw_nw = ($prefs['feature_hotwords_nw'] == 'y') ? "target='_blank'" : '';

		// Replace Hotwords
		if ($prefs['feature_hotwords'] == 'y') {
			$sep =  $prefs['feature_hotwords_sep'];
			$sep = empty($sep)? " \n\t\r\,\;\(\)\.\:\[\]\{\}\!\?\"":"$sep";
			foreach (self::$hotWords as $word => &$url) {
				// \b is a word boundary, \s is a space char
				$pregword = preg_replace("/\//", "\/", $word);

				$content = preg_replace("/(=(\"|')[^\"']*[$sep'])$pregword([$sep][^\"']*(\"|'))/i", "$1:::::$word,:::::$3", $content);
				$content = preg_replace("/([$sep']|^)$pregword($|[$sep])/i", "$1<a class=\"wiki\" href=\"$url\" $hotw_nw>$word</a>$2", $content);
				$content = preg_replace("/:::::$pregword,:::::/i", "$word", $content);
			}
		}
	}
}