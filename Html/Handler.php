<?php
class JisonParser_Html_Handler extends JisonParser_Html
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
	public function __construct(JisonParser_Html &$Parser = null)
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
			$output = $parser->parse($input);
			unset($parser);
		} else {
			$this->parsing = true;

			$this->preParse($input);

			$this->Parser->parseDepth++;
			$output = parent::parse($input);
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

	public function toWiki(&$tag, &$contents = null)
	{
		//helpers
		if ($this->hasClass($tag, "jpwch") == true) {
			return "";
		}

		//non wiki tags are ignored
		if ($this->hasClass($tag, "jpwc") != true) {
			return $this->elementFromTag($tag, $contents, true);
		}

		$result = '';

		if (!isset($this->Parser->typeStack[$tag['type']])) {
			$this->Parser->typeStack[$tag['type']] = 0;
		}
		$this->Parser->typeStack[$tag['type']]++;


		if (!isset($this->Parser->typeIndex[$tag['type']])) {
			$this->Parser->typeIndex[$tag['type']] = 0;
		}
		$this->Parser->typeIndex[$tag['type']]++;

		switch($tag['type'])
		{
			//plugin
			case "plugin":
				$result = $this->syntax($tag, urldecode($this->param($tag, 'data-syntax')));
				break;


			//start block type
			//header
			case "header":
				$hCount = $this->param($tag, 'data-count');
				$hCount = (empty($hCount) == true ? (int)substr($tag['name'], 1) : $hCount);
				$result = $this->blockStart() . $this->blockSyntax($tag, str_repeat("!", $hCount), $contents);
				break;


			//list
			case "listParent":
				$firstBlockStart = $this->blockStart();

				$result .= $this->parse($contents);

				if (empty($firstBlockStart) && strpos($result, "~REAL_BLOCK~") == 0 && $this->lastParsedType() == 'listEmpty') {
					$result = substr($result, 12);
				}

				$stash = $this->unStashStatic("listParent");

				foreach($stash as $key => $list) {
					if ($key > 0) {
						$firstBlockStart = $this->blockStart();
					}
					$result .= $firstBlockStart . $this->blockSyntax($tag, $list['symbol'], $list['contents']);
				}

				break;
			case "listEmpty":
				$result .= $this->syntax($tag, $this->parse($contents));
				break;
			case "listUnordered":
			case "listOrdered":
			case "listToggleUnordered":
			case "listToggleOrdered":
			case "listBreak":
				$symbols = array(
					"listUnordered" => "*",
					"listOrdered" => "#",
					"listToggleUnordered" => "*",
					"listToggleOrdered" => "#",
					"listBreak" => "+",
					"listEmpty" =>  ""
				);
				$depth = $this->typeDepth("listParent");

				$symbol = str_repeat($symbols[$tag['type']], $depth);

				if (strstr($tag['type'], "Toggle") !== false) {
					$symbol .= '-';
				}

				$this->stashStatic(array('symbol' => $symbol, 'contents' => $contents), 'listParent');
				break;


			//definition list
			case "listDefinitionParent":
				$contents = $this->parse($contents);
				$stash = $this->unStash("listDefinitionParent");
				foreach($stash as $list) {
					if (isset($list[0])) {
						$result .= $this->blockStart() . $this->blockSyntax($tag, ";", $list[0] . (isset($list[1]) ? ":" . $list[1] : ''));
					}
				}

				break;
			case "listDefinition":
				$this->stash(array($contents), "listDefinitionParent");
				break;
			case "listDefinitionDescription":
				$stash = $this->unStash("listDefinitionParent");
				$stash[max(count($stash) - 1, 0)][] = $contents;
				$this->replaceStash($stash, "listDefinitionParent");
				break;


			//l2r
			case "l2r":
				$result = $this->blockStart() . $this->blockSyntax($tag, "{l2r}", $contents);
				break;
			//r2l
			case "r2l":
				$result = $this->blockStart() . $this->blockSyntax($tag, "{r2l}", $contents);
				break;
			//end block type


			//noParse
			case "noParse":
				$result = $this->statedSyntax($tag, "~np~", $contents, "~/np~");
				break;

			//comment
			case "comment":
				$result = $this->statedSyntax($tag, "~tc~", $contents, "~/tc~");
				break;

			//doubleDash
			case "doubleDash":
				$result = $this->syntax($tag, " -- ");
				break;


			//bold
			case "bold":
				$result = $this->statedSyntax($tag, "__", $contents, "__");
				break;


			//italic
			case "italic":
				$result = $this->statedSyntax($tag, "''", $contents, "''");
				break;


			//table
			case "table":
				$contents = $this->parse($contents);
				$body = $this->unStashStatic("table");
				$result = $this->statedSyntax($tag, "||", implode('', $body), "||");
				break;
			case "tableBody":
				$contents = $this->parse($contents);
				$rows = $this->unStashStatic("tableBody");
				$this->stashStatic(implode("~REAL_NEW_LINE~", $rows), "table");
				break;
			case "tableRow":
				$contents = $this->parse($contents);
				$columns = $this->unStashStatic('tableRow');
				$this->stashStatic(implode("|", $columns), "tableBody");
				break;
			case "tableData":
				$contents = $this->parse($contents);
				$this->stashStatic($contents, 'tableRow');
				break;


			//strike
			case "strike":
				$result = $this->statedSyntax($tag, "--", $contents, "--");
				break;


			//code
			case "code":
				$result = $this->statedSyntax($tag, "-+", $contents, "+-");
				break;


			//horizontal row
			case "horizontalRow":
				$result = $this->syntax($tag, "---");
				break;


			//underline
			case "underscore":
				$result = $this->statedSyntax($tag, "===", $contents, "===");
				break;

			//center
			case "center":
				$result = $this->statedSyntax($tag, "::", $contents, "::"); //TODO: add in 3 ":::" if prefs need it
				break;

			//line
			case "line":
				if ($tag['htmlElementsStackCount'] == 0) {
					$result = $this->newLine();
				} else {
					$result = $this->elementFromTag($tag);
				}
				break;
			case "forcedLineEnd":
				$result = $this->syntax($tag, "%%%");
				break;


			//box
			case "box":
				$result = $this->statedSyntax($tag, "^", $contents, "^");
				break;


			//color
			case "color":
				$result = $this->statedSyntax($tag, "~~" . $this->style($tag, "color") . ":", $contents, "~~");
				break;

			//pre
			case "preFormattedText":
				$result = $this->statedSyntax($tag, "~pp~", $contents, "~/pp~");
				break;

			//titleBar
			case "titleBar":
				$result = $this->statedSyntax($tag, "-=", $contents, "=-");
				break;




			//links
			case "link": //TODO: finish implementation, need to handle alias description
				$page = $this->param($tag, 'data-page');
				$contents = $this->parse($contents);
				if ($page != $contents) {
					$page .= '|' . $contents;
				}
				$reltype = $this->param($tag, 'data-reltype');
				$result = $this->statedSyntax($tag, "($reltype(", $page, "))", false);
				break;
			case "linkWord":
				$result = trim($contents);
				break;
			case "linkNp":
				$result = $this->statedSyntax($tag, "))", $contents, "((", false);
				break;
			case "linkExternal":
				$href = $this->param($tag, 'href');
				$contents = $this->parse($contents);
				if (!empty($href) && $href != $contents) {
					$href .= '|';
				} else {
					$href = '';
				}

				$result = $this->statedSyntax($tag, "[" , $href . $contents , "]", false);
				break;

			//unlink
			case "unlink":
				$result = $this->parse($contents);
				break;

			//unhandled
			default:
				throw new Exception("Unhandled type:" . $tag['type']);
		}

		$this->Parser->typeStack[$tag['type']]--;

		return $result;
	}

	private function syntax($tag, $contents)
	{
		$this->Parser->processedTypeStack[] = $tag['type'];
		$this->Parser->firstLineHandled = true;
		return $this->preNonBlock() . $contents;
	}

	private function statedSyntax($tag, $open, $contents, $close, $parse = true)
	{
		$this->Parser->processedTypeStack[] = $tag['type'];
		$this->Parser->firstLineHandled = true;
		if ($parse == true) {
			$contents = $this->parse($contents);
		}

		if ($this->param($tag, 'data-repair')) {
			$result = $open . $contents;
		} else {
			$result = $open . $contents . $close;
		}

		return $this->preNonBlock() . $result;
	}

	private function blockSyntax($tag, $open, $contents, $parse = true)
	{
		$this->Parser->processedTypeStack[] = $tag['type'];
		$this->Parser->firstLineHandled = true;
		if ($parse == true) {
			$contents = $this->parse($contents);
		}

		return $open . $contents;
	}

	public function content($content)
	{
		return $content;
	}

	public function lineEnd($line)
	{
		if ($this->isStaticTag == true) {
			return "\n";
		}

		return "";
	}

	public function newLine()
	{
		if (empty($this->Parser->firstLineType)) {
			$this->Parser->firstLineType = 'newLine';
		}

		$this->Parser->lastBlockWasFrom = 'newLine';
		$this->Parser->firstLineHandled = true;
		return "~REAL_NEW_LINE~";
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

	private function parseElementParameters($params)
	{
		$parsedParams = array();
		if (!empty($params)) {
			$dom = new DOMDocument();
			if ($params{strlen($params) - 1} == "/") {
				$params = substr($params, 0, -1);
			}

			$dom->loadHtml("<object " . $params . " />");
			foreach ($dom->getElementsByTagName("object") as $node) {
				foreach ($node->attributes as $attribute) {
					$parsedParams[trim(strtolower($attribute->name))] = trim($attribute->value);
				}
			}
		}

		if (isset($parsedParams['style'])) {
			$styles = explode(';', $parsedParams['style']);
			$parsedParams['style'] = array();
			foreach ($styles as &$style) {
				$parts = explode(':', $style);
				if (isset($parts[0]) && isset($parts[1])) {
					$parsedParams['style'][trim($parts[0])] = trim($parts[1]);
				}
			}
		}

		if (isset($parsedParams['class'])) {
			$parsedParams['class'] = explode(' ', $parsedParams['class']);
			array_filter($parsedParams['class']);
		}

		return $parsedParams;
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

	public function hasClass(&$tag, $class)
	{
		return (isset($tag['params']['class']) && in_array($class, $tag['params']['class']));
	}

	public function paramEquals(&$tag, &$param, $equals)
	{
		return (isset($tag['params'][$param]) && strtolower($tag['params'][$param]) == strtolower($equals));
	}

	public function param(&$tag, $param)
	{
		return (isset($tag['params'][$param]) ? $tag['params'][$param] : '');
	}

	public function styleEquals(&$tag, $style, $equals)
	{
		return (isset($tag['params']['style'][$style]) && strtolower($tag['params']['style'][$style]) == strtolower($equals));
	}

	public function style(&$tag, $style)
	{
		if (isset($tag['params']['style'][$style])) {
			return $tag['params']['style'][$style];
		}
		return '';
	}

	public function hasStyle(&$tag, $style)
	{
		return isset($tag['params']['style'][$style]);
	}

	public function paramContains(&$tag, $param, $contains)
	{
		return (isset($tag['params'][$param]) && strstr($tag['params'][$param], $contains) !== false);
	}

	public function stackHtmlElement($tag)
	{
		$tag = $this->tag($tag);
		if (strstr($this->_input, '</' . $tag['name'] . '>') !== false) {
			if (!isset($this->htmlElementStack[$tag['name']])) {
				$this->htmlElementStack[$tag['name']] = array();
				$this->htmlElementStackCount[$tag['name']] = 0;
			}
			$this->htmlElementStack[$tag['name']][] = $tag;
			$this->htmlElementStackCount[$tag['name']]++;
			$this->htmlElementsStackCount++;
			$this->htmlElementsStack[] = $tag['name'];
			return true;
		} else {
			return false;
		}
	}

	public function unStackHtmlElement($ending = '')
	{
		$name = strtolower(substr(str_replace(" ", "", $ending), 2, -1));
		$this->htmlElementStackCount[$name]--;
		$this->htmlElementStackCount[$name] = max(0, $this->htmlElementStackCount[$name]);
		$this->htmlElementsStackCount--;
		$this->htmlElementsStackCount = max(0, $this->htmlElementsStackCount);
		$element = array_pop($this->htmlElementStack[$name]);
		array_pop($this->htmlElementsStack);
		$element['close'] = $ending;
		if ($element['state'] == 'open') {
			$element['state'] = 'closed';
		}

		if (!empty($element['type'])) {
			array_pop($this->Parser->typeIndex);
		}

		return $element;
	}

	public function tag(&$tag)
	{
		$parts = preg_split("/[ >]/", substr($tag, 1)); //<tag> || <tag name="">
		$name = array_shift($parts);
		$name = strtolower(trim($name));
		$end = array_pop($parts);
		$params = implode(" ", $parts);
		$params = $this->parseElementParameters($params);
		$type = "";

		if (isset($params['data-t'])) {
			$type = JisonParser_WikiCKEditor_Handler::typeFromShorthand(strtolower($params['data-t']));
		}

		return array(
			"name" => $name,
			"params" => $params,
			"open" => $tag,
			"state" => "open",
			"type" => $type,
			"htmlElementsStackCount" => $this->htmlElementsStackCount
		);
	}

	public function inlineTag(&$tag)
	{
		$tag = $this->tag($tag);
		$tag['state'] = 'inline';
		return $tag;
	}

	public function compareElementClosingToYytext(&$tag, $yytext)
	{
		$yytext = strtolower(str_replace(' ', '', $yytext));
		if ($yytext == strtolower("</" . $tag['name'] . ">")) {
			return true;
		}
	}

	public function elementFromTag(&$tag, &$contents = null, $parse = false)
	{
		if ($parse == true) {
			$parser = new JisonParser_Html_Handler();
			$parser->isStaticTag(true);
			$contents = $parser->parse($contents);
			unset($parser);
		}

		switch($tag['state']) {
			case "closed":
				$element = $tag['open'] . $contents . $tag['close'];
				break;
			case "repaired":
				$element = $tag['open'] . $contents;
				break;
			case "inline":
				$element = $tag['open'];
				break;
		}

		return $element;
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
		$stack = key($this->htmlElementStack);
		end($this->htmlElementStack[$stack]);
		$element = key($this->htmlElementStack[$stack]);

		if (isset($this->htmlElementStack[$stack][$element])) {
			return array('stack' => $stack, 'element' => $element);
		}
	}
}