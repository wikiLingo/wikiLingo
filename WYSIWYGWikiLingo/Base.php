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

	public $isStaticTag = false;
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