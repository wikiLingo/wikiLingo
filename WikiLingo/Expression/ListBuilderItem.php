<?php

namespace WikiLingo\Expression;
use WikiLingo;

class ListBuilderItem extends Base
{
    public $parsed;
    public $items = array();
    public $itemCount = 0;
	public $type = 'list';
	public $depth = 0;
	public $listType = '';
	public $listModifier = '';

	public static $listTypes = array(
		'+' => "Break",
		'*' => "Unordered",
		'#' => "Ordered",
		';' => "Definition"
	);

	public $modifierUsed = false;
	public static $listModifiers = array(
		'-' => 'Toggle'
	);

    function __construct(WikiLingo\Parsed &$parsed, Block &$block)
    {
        $this->parsed = $parsed;
	    $depth = $this->depth = strlen($parsed->text);
	    if (isset(self::$listModifiers[$parsed->text{$depth - 1}])) {
		    $this->listModifier = self::$listModifiers[$parsed->text{$depth - 1}];
		    $this->modifierUsed = true;
		    $this->depth--;
	    }
    }

    private function addRecursiveChildrenUntil(
        $depth = 0,
        $depthNeeded = 0,
        ListBuilder $parent,
        EmptyListItem $bridge = null,
        ListBuilder $child
    )
    {
        if ($depth == 0) {
            $nextBridgeItem = new EmptyListItem($child);
            return $this->addRecursiveChildrenUntil($parent, $nextBridgeItem, $child);
        } elseif ($depth < $depthNeeded) {
            $nextBridgeItem = new EmptyListItem($child);

            return $this->addRecursiveChildrenUntil($parent, $nextBridgeItem, $child);
        }
    }

	function render(&$parser)
	{
		$result = '';
		$lastI = -1;
		$lastType = '';
		$parentTagTypes = array(
			"Break" => '',
			"Unordered" => 'ul',
			"Ordered" => 'ol',
			"Definition"
		);
		$tagType = 'ul';

		foreach ($this->items as $key => $item) {
			if ($lastI > -1) {
				if ($lastI < $item->depth) {
					$difference = $item->depth - $lastI;

					$opening = "<" . $tagType . ">";
					$result .= $opening;

					if ($difference > 1) {
						$result .= str_repeat('<li class="empty">' . $opening, $difference - 1);
					}
				}

				if ($lastI > $item->depth) {
					$difference = $lastI - $item->depth;

					$closing = "</" . $tagType . ">";

					$result .= $closing;

					if ($difference > 1) {
						$result .= str_repeat('</li>' . $closing, $difference - 1);
					}
				}
			}
			$result .= '<li>' . $item->text->render($parser);
			if ($key > 0) {
				$result .= '</li>';
			}
			$lastI = $item->depth;
		}

		//$child = new WikiLingo_Expression_Tag('<' . $tagType . '>', '</' . $tagType . '>', $result);
		return '<ul>' . $result . '</ul>' . parent::render($parser);
	}

	/*public $stacks = array();
	public $index = 0;
	public $lineNumberLast;
	public $levelLast = 0;
	public $id;
	public $key;
	public $parser;

	function render(&$parser)
	{
		$items = $this->items;
        $lastParentTagType = '';
		$lastType = '';
		$id = '';
		$html = '';

		for ($i = 0, $length = $this->itemCount; $i < $length; $i++) {
            $item = $items[$i];
			$html .= $this->writeParentStartTag($parser, $item->listType, $lastType, $lastParentTagType);

			if (isset($item)) {
				switch($item->listType) {
					case '*-':
					case '#-':
						//$headerlib->add_css("#" . $id . "{display: none;}");
					case '+':
					case 'Unordered':
					case 'Ordered':
						$html .= $parser->createWikiTag(
							"list" . $item->listType,
							"li",
							$stack[$i]['content'] . $this->toHtmlChildren($stack[$i]['children']),
							array("class" => "tikiListItem")
						)->render($parser);
						$html .= $this->advanceUntilNotType($parser, $i, $stack);
						break;
					case ';':
						$parts = explode(':', $stack[$i]['content']);
						$html .= $parser->createWikiTag("list" . $item->listType, "dt", $parts[0])->render($parser);
						if (isset($parts[1])) {
							$html .= $parser->createWikiTag("list" . $item->listType . "Description", "dd", $parts[1])->render($parser);
						}
						break;
				}
			} else if (!empty($stack[$i]['children'])) { //In this scenario, we have a jump in list types
				$html .= $this->parser->createWikiTag(
					"listEmpty",
					"li",
					$this->toHtmlChildren($stack[$i]['children']),
					array(
						'style' => 'list-style-type:none;'
					)
				)->render($parser);
			}
		}

		unset($stack);

		$html .= $this->writeParentEndTag($parser, $lastParentTagType);

		return $html;
	}

	private function writeParentStartTag(&$parser, $listType, &$lastListType, &$parentTagType)
	{
		$result = '';
		if ($listType != $lastListType && $this->lineCompatibility($listType, $lastListType) != true) {
			$preTag = '';
			if (empty($parentTagType) == false) {
				$result .= $this->writeParentEndTag($parser, $parentTagType);
			}

			$parentTagType = $this->parentTagType($listType);

			if ($listType == "*-" || $listType == "#-") {
				$preTag .= $parser->createWikiHelper("listBreak", "br", "", array(), "inline")->render($parser);
				$preTag .= $parser->createWikiHelper(
					"listButton",
					"a",
					"[+]",
					array(
						"id" => "flipper",
						"href" => "javascript:flipWithSign();",
						"class" => "link"
					)
				)->render($parser);
			}

			$lastListType = $this->listType;

			if ($listType == ";") {
				$tagListType = "listDefinitionParent";
			} else {
				$tagListType = "listParent";
			}

			$result .= $preTag . $parser->createWikiTag(
				$tagListType,
				$parentTagType,
				"",
				array(
					"class" => "tikiList"
				),
				"open"
			)->render($parser);
		}

		return $result;
	}

	private function lineCompatibility($thisListType = '', $lastListType = '')
	{
		if (
			($lastListType == "Unordered" && $thisListType == "Break") ||
			($lastListType == "Break" && $thisListType == "Unordered")
		) {
			return true;
		}

		if ($lastListType == $thisListType) {
			return true;
		}

		return false;
	}

	private function writeParentEndTag(&$parser, $parentTagType)
	{
		if (!empty($parentTagType)) {
			return $parser->createWikiTag("list", $parentTagType, "", array(), "close")->render($parser);
		} else {
			return "";
		}
	}

	private function parentTagType($listType = '')
	{
		switch ($listType) {
			case 'Unordered':
			case 'Break':
				return 'ul';
				break;
			case 'Ordered':
				return 'ol';
				break;
			case 'Definition':
				return 'dl';
				break;
		}
	}

	private function advanceUntilNotType(&$parser, &$i, &$stack, $type = "+")
	{
		$result = '';
		$i++;
		for ($length = count($stack); $i <= $length; $i++) {
			if (!isset($stack[$i]['type'])) break;
			if ($stack[$i]['type'] == $type) {
				$result .= $this->parser->createWikiTag(
					"listBreak",
					"li",
					$stack[$i]['content'],
					array(
						'style' => 'list-style-type:none;'
					)
				)->render();
			} else {
				$i--;
				break;
			}
		}

		return $result;
	}*/


}
