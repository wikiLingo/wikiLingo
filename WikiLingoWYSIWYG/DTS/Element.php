<?php

class WikiLingoWYSIWYG_DTS_Element extends WikiLingo_Expression
{
	public $name;
	public $attributes;
	public $open;
	public $state = "open";
	public $type;
	public $stackCount;

	function __construct($tag, $stackCount, $state = '')
	{

		$parts = preg_split("/[ >]/", substr($tag, 1)); //<tag> || <tag name="">
		$name = array_shift($parts);
		$this->name = strtolower(trim($name));
		$end = array_pop($parts);
		$this->attributes = implode(" ", $parts);
        $this->state = $state;
		$type = "";

		$this->open = ($state == 'closed' || $state == 'inline' ? false : true);
		$this->stackCount = $stackCount;

		$this->parseElementAttributes();

		if (isset($this->attributes['data-t'])) {
			$this->type = WikiLingoWYSIWYG::typeFromShorthand(strtolower($this->attributes['data-t']));
		}
	}

    public function render(&$parser)
    {
		//helpers
		if ($this->hasClass("wlwh") == true) {
			return "";
		}

		//non wiki tags are ignored
		if ($this->hasClass("wlw") != true) {
			//return $this->elementFromTag($contents, true);
		}

		$result = '';

		if (!isset($this->Parser->typeStack[$this->type])) {
			$this->Parser->typeStack[$this->type] = 0;
		}
		$this->Parser->typeStack[$this->type]++;


		if (!isset($this->Parser->typeIndex[$this->type])) {
			$this->Parser->typeIndex[$this->type] = 0;
		}
		$this->Parser->typeIndex[$this->type]++;

		switch($this->type)
		{
			//plugin
			case "plugin":
                if ($this->state == 'closed' && $this->open == false) {
                    $attributes = json_decode(rawurldecode($this->attributes['data-parameters']));
                    $name = '';
                    $body = '';

                    $body .= $this->renderChildren($parser);

                    $attributesArray = array();
                    foreach($attributes as $key => $attribute) {
                        $attributesArray[] = $key . '="' . $attribute . '"';
                    }

                    if (isset($this->attributes['data-body'])) {
                        //regular plugin
                        $name .= strtoupper($this->attr('data-name'));
                        $result = '{' . $name . '(';
                        $result .= implode($attributesArray, ' ');
                        $result .= ')}';
                        $result .= $body;
                        $result .= '{' . $name . '}';
                    } else {
                        //inline plugin
                        $name .= strtoupper($this->attr('data-name'));
                        $result = '{' . $name . ' ';
                        $result .= implode($attributesArray, ' ');
                        $result .= '}';
                    }
                    return $result;
                }
				break;


			//start block type
			//header
			case "header":
				$hCount = $this->param('data-count');
				$hCount = (empty($hCount) == true ? (int)substr($this->name, 1) : $hCount);
				$result = $this->blockStart() . $this->blockSyntax(str_repeat("!", $hCount), $contents);
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
					$result .= $firstBlockStart . $this->blockSyntax($list['symbol'], $list['contents']);
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

				$symbol = str_repeat($symbols[$this->type], $depth);

				if (strstr($this->type, "Toggle") !== false) {
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
						$result .= $this->blockStart() . $this->blockSyntax(";", $list[0] . (isset($list[1]) ? ":" . $list[1] : ''));
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
				$result = $this->blockStart() . $this->blockSyntax("{l2r}", $contents);
				break;
			//r2l
			case "r2l":
				$result = $this->blockStart() . $this->blockSyntax("{r2l}", $contents);
				break;
			//end block type


			//noParse
			case "noParse":
				$result = $this->statedSyntax("~np~", $contents, "~/np~");
				break;

			//comment
			case "comment":
				$result = $this->statedSyntax("~tc~", $contents, "~/tc~");
				break;

			//doubleDash
			case "doubleDash":
				$result = $this->syntax(" -- ");
				break;


			//bold
			case "bold":
				$result = '__' . $this->renderChildren($parser) . '__' . $this->renderSiblings($parser);
				break;


			//italic
			case "italic":
				$result = $this->statedSyntax("''", $contents, "''");
				break;


			//table
			case "table":
				$contents = $this->parse($contents);
				$body = $this->unStashStatic("table");
				$result = $this->statedSyntax("||", implode('', $body), "||");
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
				$result = $this->statedSyntax("--", $contents, "--");
				break;


			//code
			case "code":
				$result = $this->statedSyntax("-+", $contents, "+-");
				break;


			//horizontal row
			case "horizontalRow":
				$result = $this->syntax("---");
				break;


			//underline
			case "underscore":
				$result = $this->statedSyntax("===", $contents, "===");
				break;

			//center
			case "center":
				$result = $this->statedSyntax("::", $contents, "::"); //TODO: add in 3 ":::" if prefs need it
				break;

			//line
			case "line":
				if (is_null($this->parent)) {
					$result = $this->newLine($parser);
				} else {
					$result = $this->elementFromTag();
				}
				break;
			case "forcedLineEnd":
				$result = $this->syntax("%%%");
				break;


			//box
			case "box":
				$result = $this->statedSyntax("^", $contents, "^");
				break;


			//color
			case "color":
				$result = $this->statedSyntax("~~" . $this->style("color") . ":", $contents, "~~");
				break;

			//pre
			case "preFormattedText":
				$result = $this->statedSyntax("~pp~", $contents, "~/pp~");
				break;

			//titleBar
			case "titleBar":
				$result = $this->statedSyntax("-=", $contents, "=-");
				break;




			//links
			case "link": //TODO: finish implementation, need to handle alias description
				$page = $this->attr('data-page');
				$contents = $this->parse($contents);
				if ($page != $contents) {
					$page .= '|' . $contents;
				}
				$reltype = $this->attr('data-reltype');
				$result = $this->statedSyntax("($reltype(", $page, "))", false);
				break;
			case "linkWord":
				$result = trim($contents);
				break;
			case "linkNp":
				$result = $this->statedSyntax("))", $contents, "((", false);
				break;
			case "linkExternal":
				$href = $this->param('href');
				$contents = $this->parse($contents);
				if (!empty($href) && $href != $contents) {
					$href .= '|';
				} else {
					$href = '';
				}

				$result = $this->statedSyntax("[" , $href . $contents , "]", false);
				break;

			//unlink
			case "unlink":
				$result = $this->parse($contents);
				break;

			//unhandled
			default:
				throw new Exception("Unhandled type:" . $this->type);
		}

		$this->Parser->typeStack[$this->type]--;

		return $result;
	}

	public function elementFromTag(&$contents = null, $parse = false)
	{
		if ($parse == true) {
			$parser = new WikiLingoWYSIWYG_DTS();
			$parser->isStaticTag(true);
			$contents = $parser->parse($contents);
			unset($parser);
		}

		switch($this->state) {
			case "closed":
				$element = $this->open . $contents . $this->close;
				break;
			case "repaired":
				$element = $this->open . $contents;
				break;
			case "inline":
				$element = $this->open;
				break;
		}

		return $element;
	}

	private function blockSyntax($open, $contents, $parse = true)
	{
		$this->Parser->processedTypeStack[] = $this->type;
		$this->Parser->firstLineHandled = true;
		if ($parse == true) {
			$contents = $this->parse($contents);
		}

		return $open . $contents;
	}


	private function parseElementAttributes()
	{
		$parsed = array();
		if (!empty($this->attributes)) {
			$dom = new DOMDocument();
			if ($this->attributes{strlen($this->attributes) - 1} == "/") {
				$this->attributes = substr($this->attributes, 0, -1);
			}

			$dom->loadHtml("<object " . $this->attributes . " />");
			foreach ($dom->getElementsByTagName("object") as $node) {
				foreach ($node->attributes as $attribute) {
					$parsed[trim(strtolower($attribute->name))] = trim($attribute->value);
				}
			}
		}

		if (isset($parsed['style'])) {
			$styles = explode(';', $parsed['style']);
			$parsed['style'] = array();
			foreach ($styles as &$style) {
				$parts = explode(':', $style);
				if (isset($parts[0]) && isset($parts[1])) {
					$parsed['style'][trim(strtolower($parts[0]))] = trim($parts[1]);
				}
			}
		}

		if (isset($parsed['class'])) {
			$parsed['class'] = explode(' ', $parsed['class']);
			array_filter($parsed['class']);
		}

		$this->attributes = $parsed;
	}

	public function hasClass($class)
	{
		return (isset($this->attributes['class']) && in_array($class, $this->attributes['class']));
	}

	public function attrEquals(&$attr, $equals)
	{
		return (isset($this->attributes[$attr]) && strtolower($this->attributes[$attr]) == strtolower($equals));
	}

	public function attr($attr)
	{
		return (isset($this->attributes[$attr]) ? $this->attributes[$attr] : '');
	}

	public function styleEquals($style, $equals)
	{
		return (isset($this->attributes['style'][$style]) && strtolower($this->attributes['style'][$style]) == strtolower($equals));
	}

	public function style($style)
	{
		if (isset($this->attributes['style'][$style])) {
			return $this->attributes['style'][$style];
		}
		return '';
	}

	public function hasStyle($style)
	{
		return isset($this->attributes['style'][$style]);
	}

	public function paramContains($param, $contains)
	{
		return (isset($this->attributes[$param]) && strstr($this->attributes[$param], $contains) !== false);
	}

    private function syntax($contents)
    {
        $this->Parser->processedTypeStack[] = $this->type;
        $this->Parser->firstLineHandled = true;
        return $this->preNonBlock() . $contents;
    }

    private function statedSyntax($tag, $open, $contents, $close, $parse = true)
    {
        $this->Parser->processedTypeStack[] = $tag->type;
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

    public function newLine(&$parser)
    {
        if (empty($parser->firstLineType)) {
            $parser->firstLineType = 'newLine';
        }

        $parser->lastBlockWasFrom = 'newLine';
        $parser->firstLineHandled = true;
        return "~REAL_NEW_LINE~";
    }
}