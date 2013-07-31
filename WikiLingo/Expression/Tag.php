<?php

namespace WikiLingo\Expression;
use WikiLingo;

class Tag extends Base
{
	public $notAllowed = array(
		'script' => true
	);

	public $ignoresNextLine = array(
		'hr' => true,
		'br' => true
	);

	public $beginBlock = array(
		'h1' => true,
		'h2' => true,
		'h3' => true,
		'h4' => true,
		'h5' => true,
		'h6' => true,
		'pre' => true,
		'ul' => true,
		'li' => true,
		'dl' => true,
		'div' => true,
		'table' => true,
		'p' => true
	);

	public $endBlock = array(
		'/h1' => true,
		'/h2' => true,
		'/h3' => true,
		'/h4' => true,
		'/h5' => true,
		'/h6' => true,
		'/pre' => true,
		'/ul' => true,
		'/li' => true,
		'/dl' => true,
		'/div' => true,
		'/table' => true,
		'/p' => true,
		'/script' => true
	);

	function __construct(WikiLingo\Parsed &$parsed)
	{
		parent::__construct($parsed);
	}

	function render(&$parser)
	{
		return $this->parsed->text;
	}

	/**
	 * syntax handler: generic html
	 * <p>
	 * Used in detecting if we need a break, and line number in some cases
	 *
	 * @access  public
	 * @param   $content string parsed string found inside detected syntax
	 * @return  string  $content desired output from syntax
	 */
	public static function isHtmlTag($content)
	{
		$parts = preg_split("/[ >]/", substr($content, 1)); //<tag> || <tag name="">
		$name = strtolower(trim($parts[0]));

		switch ($name) {
			//start block level
			case 'h1':
			case 'h2':
			case 'h3':
			case 'h4':
			case 'h5':
			case 'h6':
			case 'pre':
			case 'ul':
			case 'li':
			case 'dl':
			case 'div':
			case 'table':
			case 'p':
				//$this->skipBr = true;
			case 'script':
				//$this->nonBreakingTagDepth++;
				//$this->line++;
				break;

			//end block level
			case '/h1':
			case '/h2':
			case '/h3':
			case '/h4':
			case '/h5':
			case '/h6':
			case '/pre':
			case '/ul':
			case '/li':
			case '/dl':
			case '/div':
			case '/table':
			case '/p':
				//$this->skipBr = true;
			case '/script':
				//$this->nonBreakingTagDepth--;
				//$this->nonBreakingTagDepth = max($this->nonBreakingTagDepth, 0);
				//$this->line++;
				break;

			//skip next block level
			case 'hr':
			case 'br':
				//$this->skipBr = true;
				break;
		}

		return $content;
	}
}