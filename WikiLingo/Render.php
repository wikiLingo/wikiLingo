<?php
namespace WikiLingo;

use WikiLingo\Expression;

class Render
{
	public $parser;
	function __construct(&$parser)
	{
		$this->parser =& $parser;
	}

	function constructAndRenderType(Parsed &$parsed)
	{
		$class = "WikiLingo\\Expression\\$parsed->type";
		$expression = new $class($parsed);
		if ($expression) {

		}
	}

	function render(Parsed &$parsed)
	{
		$children = '';
		foreach($parsed->children as &$child) {
			$children .= $this->render($child);
		}

		$content = '';
		foreach($parsed->contents as &$content) {
			$content .= $this->render($content);
		}

		$lines = '';
		foreach($parsed->lines as &$line) {
			$lines .= $this->render($line);
		}

		$output = $this->constructAndRenderType($parsed, $children);

		return $output;
	}
}