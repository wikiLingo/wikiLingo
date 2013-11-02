<?php
namespace WYSIWYGWikiLingo;

use WYSIWYGWikiLingo\Expression;

class Base
{
	public $parsing = false;
	private $parserDebug = true;
	private $lexerDebug = true;

	public $events;

	/* html tag tracking */
	public $typeIndex = [];
	public $htmlElementStack = [];
	public $htmlElementStackCount = [];
	public $htmlElementsStackCount = 0;
	public $htmlElementsStack = [];

	public $typeStack = [];

	public $lastBlockWasFrom = '';
	public $firstLineType = '';
	public $isStaticTag = false;
	public $firstLineHandled = false;
	public $processedTypeStack = '';
    public $closingTagRegex = "/^(?:(<\/(.|\n)[^>]*?>))/";

/*
	function parser_performAction(&$thisS, $yytext, $yyleng, $yylineno, $yystate, $S, $_S, $O)
	{
		$result = parent::parser_performAction($thisS, $yytext, $yyleng, $yylineno, $yystate, $S, $_S, $O);
		if ($this->parserDebug == true) {
			$thisS = "{" . $thisS . ":" . $yystate ."}";
		}
		return $result;
	}

	function lexer_performAction(&$yy, $yy_, $avoiding_name_collisions, $YY_START = null) {
		$result = parent::lexer_performAction($yy, $yy_, $avoiding_name_collisions, $YY_START);
		if ($this->lexerDebug == true) {
			echo "{" . $result . ":" .$avoiding_name_collisions . "}" . $yy_->yytext . "\n";
		}
		return $result;
	}

	function parseError($error, $info)
	{
		echo $error;
		print_r($info);
		die;
	}
*/

	function isStaticTag($isStaticTag)
	{
		$this->isStaticTag = $isStaticTag;
	}

	public function content($content)
	{
		return new Expression\Content($content->text);
	}

	public function lineEnd($line)
	{
		if ($this->isStaticTag == true) {
			return new Expression\Line($line);
		}

		return new Expression\Line($line);
	}

	public function preNonBlock()
	{
		$lastParsedType = $this->lastParsedType();
		if ($lastParsedType == 'listEmpty') {
			return '';
		}

		if ($this->lastBlockWasFrom == 'block') {
			$this->lastBlockWasFrom = '';
			return "\n";
		}
		return "";
	}

	public function typeDepth($type)
	{
		return (isset($this->typeStack[$type]) ? $this->typeStack[$type] : -1);
	}

	public function stackHtmlElement($tag)
	{
		$this->htmlElementStack[] = $tag;
		$this->htmlElementStackCount++;
	}

	public function unStackHtmlElement($ending = null, $isLookAhead = false)
	{
		$name = strtolower(substr(str_replace(" ", "", $ending), 2, -1));

		$possibleTagMatch = end($this->htmlElementStack);

        $pos = strpos($possibleTagMatch->text, $name);

		if ($pos != 1) {
			return null;
		}

        if ($isLookAhead) {
            return $possibleTagMatch;
        }

		$this->htmlElementStackCount--;
		$this->htmlElementStackCount = max(0, $this->htmlElementStackCount);
		$beginning = array_pop($this->htmlElementStack);

		return $beginning;
	}

    public function killStackedHtmlElement()
    {
        $this->htmlElementStackCount--;
        $this->htmlElementStackCount = max(0, $this->htmlElementStackCount);
        array_pop($this->htmlElementStack);
    }

	public function blockStart()
	{
		if (
			$this->lastBlockWasFrom == 'newLine' &&
			$this->lastParsedType() == ''
		) {
			$this->lastBlockWasFrom = 'block';
			$this->firstLineHandled = true;
			return '';
		}

		if (empty($this->firstLineType)) {
			$this->firstLineType = 'block';
		}

		if (
			(
				$this->firstLineHandled == false
			)
		) {
			$this->firstLineHandled = true;
			return '';
		}
		return "~REAL_BLOCK~";
	}

	public function lastParsedType()
	{
		if (isset($this->processedTypeStack[count($this->processedTypeStack) - 1])) {
			return $this->processedTypeStack[count($this->processedTypeStack) - 1];
		}
		return '';
	}

	function getMissingClosingKeys()
	{
		end($this->htmlElementStack);
		$element = key($this->htmlElementStack);

		if (isset($this->htmlElementStack[$element])) {
			return ['element' => $element];
		}
	}

	public function bind($class, $event, $fn)
	{

		$this->events->bind($class, $event, $fn);
	}

	public function unbind($eventName)
	{
		$this->events->unbind($eventName);
	}

	public function trigger($class, $event, &$obj = null, &$out = null)
	{
		$this->events->trigger($class, $event, $obj, $out);
	}
}