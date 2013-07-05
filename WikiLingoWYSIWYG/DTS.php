<?php
class WikiLingoWYSIWYG_DTS extends WikiLingoWYSIWYG_DTS_Definition
{
	public $parsing = false;
	public $parseDepth = 0;
	private $parserDebug = true;
	private $lexerDebug = true;

	/* html tag tracking */
	public $typeIndex = array();
	public $htmlElementStack = array();
	public $htmlElementStackCount = array();
	public $htmlElementsStackCount = 0;
	public $htmlElementsStack = array();

	public $typeStack = array();
	public $stash = array();

	public $blockSyntax = array(
		"\n!",
		"\n*",
		"\n#",
		"\n+",
		"\n;",
		"\n{r2l}",
		"\n{l2r}",
	);

	public $lastBlockWasFrom = '';
	public $firstLineType = '';
	public $isStaticTag = false;
	public $firstLineHandled = false;
	public $processedTypeStack = '';

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
	public function __construct(&$Parser = null)
	{
		if (empty($Parser)) {
			$this->Parser = &$this;
		} else {
			$this->Parser = &$Parser;
		}

		parent::__construct();
	}

	public function preParse(&$input)
	{
		if ($this->Parser->parseDepth == 0) {
			$this->Parser->typeIndex = array();
			$this->Parser->typeStack = array();
			$this->Parser->type = array();
			$this->Parser->lastBlockWasFrom = '';
			$this->Parser->firstLineType = '';
			$this->Parser->firstLineHandled = false;
			$this->Parser->processedTypeStack = array();
		}

		$this->htmlElementStack = array();
		$this->htmlElementStackCount = array();
		$this->htmlElementsStackCount = 0;
		$this->htmlElementsStack = array();
	}

	public function parse($input)
	{
		if (empty($input)) {
			return $input;
		}

		if ($this->parsing == true) {
			$class = get_class($this->Parser);
			$parser = new $class($this->Parser);
			$output = $parser->parse($input)->text;
			unset($parser);
		} else {
			$this->parsing = true;

			$this->preParse($input);

			$this->Parser->parseDepth++;
			$output = parent::parse($input)->text;
			$this->Parser->parseDepth--;

			$this->parsing = false;
			$this->postParse($output);
		}

		return $output;
	}

	public function postParse(&$output)
	{
		/* While parsing we add a "\n" to the beginning of all block types, but if the input started with a block char,
		 * it is also valid, but treated and restored as with "\n" just before it, here we remove that extra "\n" but
		 * only if we are a block, which are determined from $this->blockChars
		*/
		$output = $output->render($this->Parser);
		if ($this->Parser->parseDepth == 0) {
			$output = str_replace('~REAL_BLOCK~', "\n", $output);
			$output = str_replace('~REAL_NEW_LINE~', "\n", $output);

			if ($this->Parser->firstLineType == 'block' && $this->isStaticTag == false) {
				foreach($this->blockSyntax as $syntax) {
					if (strpos($output, $syntax) === 0) {
						$output = substr($output, 1); //we only want to get rid of "\n", not the whole syntax
					}
				}
			}
		}
	}

	function isStaticTag($isStaticTag)
	{
		$this->isStaticTag = $isStaticTag;
	}

	public function content($content)
	{
		return new WikiLingoWYSIWYG_Expression($content->text);
	}

	public function lineEnd($line)
	{
		if ($this->isStaticTag == true) {
			return new WikiLingoWYSIWYG_Expression("\n");
		}

		return new WikiLingoWYSIWYG_Expression("");
	}

	public function preNonBlock()
	{
		$lastParsedType = $this->lastParsedType();
		if ($lastParsedType == 'listEmpty') {
			return '';
		}

		if ($this->Parser->lastBlockWasFrom == 'block') {
			$this->Parser->lastBlockWasFrom = '';
			return "\n";
		}
		return "";
	}

	public function stashStatic($whatToStash, $id)
	{
		if (!isset($this->Parser->stash[$id])) {
			$this->Parser->stash[$id] = array();
		}

		$this->Parser->stash[$id][] = $whatToStash;
	}

	public function replaceStashStatic($array = array(), $id)
	{
		$this->Parser->stash[$id] = $array;
	}

	public function unStashStatic($id)
	{
		$stash = array();

		if (isset($this->Parser->stash[$id])) {
			$stash = $this->Parser->stash[$id];
			unset($this->Parser->stash[$id]);
		}

		return (isset($stash) ? $stash : array());
	}

	public function stash($whatToStash, $type)
	{
		$this->stashStatic($whatToStash, $type . $this->typeDepth($type));
	}

	public function replaceStash($array = array(), $type)
	{
		$this->replaceStashStatic($array, $type . $this->typeDepth($type));
	}

	public function unStash($type)
	{
		return $this->unStashStatic($type . $this->typeDepth($type));
	}

	public function typeDepth($type)
	{
		return (isset($this->Parser->typeStack[$type]) ? $this->Parser->typeStack[$type] : -1);
	}

	public function stackHtmlElement($tag)
	{
		$this->htmlElementStack[] = $tag;
		$this->htmlElementStackCount++;
	}

	public function unStackHtmlElement($ending = '')
	{
		$name = strtolower(substr(str_replace(" ", "", $ending), 2, -1));

		$possibleTagMatch = end($this->htmlElementStack);

		if (strpos($possibleTagMatch, $name) != 1) {
			return false;
		}

		$this->htmlElementStackCount--;
		$this->htmlElementStackCount = max(0, $this->htmlElementStackCount);
		$tag = array_pop($this->htmlElementStack);
		$element = $this->elementFromString($tag, true);
		$element->close = $ending;

		if (!empty($element->type)) {
			array_pop($this->Parser->typeIndex);
		}

		return $element;
	}

    public function elementFromString(&$tag, $closed = false)
    {
        return new WikiLingoWYSIWYG_DTS_Element($tag, $this->htmlElementStackCount, ($closed == true ? 'closed' : 'open'));
    }

	public function element(&$tag, $closed = false)
	{
		return new WikiLingoWYSIWYG_DTS_Element($tag->text, $this->htmlElementStackCount, ($closed == true ? 'closed' : 'open'));
	}

	public function inlineElement(&$tag)
	{
		return new WikiLingoWYSIWYG_DTS_Element($tag->text, $this->htmlElementStackCount, 'inline');
	}

	public function blockStart()
	{
		if (
			$this->Parser->lastBlockWasFrom == 'newLine' &&
			$this->lastParsedType() == ''
		) {
			$this->Parser->lastBlockWasFrom = 'block';
			$this->Parser->firstLineHandled = true;
			return '';
		}

		if (empty($this->Parser->firstLineType)) {
			$this->Parser->firstLineType = 'block';
		}

		if (
			(
				$this->Parser->parseDepth == 1 &&
				$this->Parser->firstLineHandled == false
			)
		) {
			$this->Parser->firstLineHandled = true;
			return '';
		}
		return "~REAL_BLOCK~";
	}

	public function lastParsedType()
	{
		if (isset($this->Parser->processedTypeStack[count($this->Parser->processedTypeStack) - 1])) {
			return $this->Parser->processedTypeStack[count($this->Parser->processedTypeStack) - 1];
		}
		return '';
	}

	public static function isHtmlTag(&$yytext)
	{
		$parts = explode(" ", substr($yytext, 1, -1));
		$parts = array_filter($parts, 'strlen');

		if ($parts[0]{0} == "/") {
			$parts[0] = substr($parts[0], 1);
		} else if ($parts[0]{strlen($parts[0]) - 1} == "/") {
			$parts[0] = substr($parts[0], 0, -1);
		}

		switch (strtolower($parts[0])) {
			case "!doctype":
			case "a":
			case "abbr":
			case "acronym":
			case "address":
			case "applet":
			case "area":
			case "article":
			case "aside":
			case "audio":
			case "b":
			case "base":
			case "basefront":
			case "bdi":
			case "bdo":
			case "big":
			case "blockquote":
			case "body":
			case "br":
			case "button":
			case "canvas":
			case "caption":
			case "center":
			case "cite":
			case "code":
			case "col":
			case "colgroup":
			case "command":
			case "datalist":
			case "dd":
			case "del":
			case "details":
			case "dfn":
			case "dir":
			case "div":
			case "dl":
			case "dt":
			case "em":
			case "embed":
			case "fieldset":
			case "figcaption":
			case "figure":
			case "font":
			case "footer":
			case "form":
			case "frameset":
			case "h1":
			case "h2":
			case "h3":
			case "h4":
			case "h5":
			case "h6":
			case "head":
			case "header":
			case "hgroup":
			case "hr":
			case "html":
			case "i":
			case "iframe":
			case "img":
			case "input":
			case "ins":
			case "kbd":
			case "keygen":
			case "label":
			case "legend":
			case "li":
			case "link":
			case "map":
			case "mark":
			case "menu":
			case "meta":
			case "meter":
			case "nav":
			case "noframes":
			case "noscript":
			case "object":
			case "ol":
			case "optgroup":
			case "option":
			case "output":
			case "p":
			case "param":
			case "pre":
			case "progress":
			case "q":
			case "q":
			case "rp":
			case "rt":
			case "ruby":
			case "s":
			case "samp":
			case "script":
			case "section":
			case "select":
			case "small":
			case "source":
			case "span":
			case "strike":
			case "strong":
			case "style":
			case "sub":
			case "summary":
			case "sup":
			case "table":
			case "tbody":
			case "td":
			case "textarea":
			case "tfoot":
			case "th":
			case "thead":
			case "time":
			case "title":
			case "tr":
			case "track":
			case "tt":
			case "u":
			case "ul":
			case "var":
			case "video":
			case "wbr":
				return true;
		}

		return false;
	}

	function getMissingClosingKeys()
	{
		end($this->htmlElementStack);
		$element = key($this->htmlElementStack);

		if (isset($this->htmlElementStack[$element])) {
			return array('element' => $element);
		}
	}
}