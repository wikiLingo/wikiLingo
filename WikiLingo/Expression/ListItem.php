<?php

namespace WikiLingo\Expression;
use WikiLingo;

class ListItem extends Base
{
    public $parsed;
    public $block;
    public $children = array();
    public $childrenLength = 0;
	public $listType = '';
	public $listModifier = '';
    public $content;
    public $lineNo;

	public static $listTypes = array(
		'+' => "Break",
		'*' => "Unordered",
		'#' => "Ordered",
		';' => "Definition"
	);

    function __construct(WikiLingo\Parsed &$parsed, Block &$block)
    {
        $this->parsed = $parsed;
        $this->block = $block;

        $this->content = $parsed->arguments[1];

        $this->lineNo = $parsed->lineNo;
    }

	function render(&$parser)
	{
		$element = $parser->element(__CLASS__, 'li');
        $element->staticChildren[] = $this->content->expression->render($parser);
        foreach ($this->children as &$child)
        {
            $element->staticChildren[] = $child->render($parser);
        }
        return $element->render();
	}

    public function addChild(
        $depth = 0,
        $depthNeeded = 0,
        &$parent,
        &$childItem,
        &$childItems = null
    )
    {
        if ($depth < $depthNeeded) {
            $depth++;

            if (isset($parent->lastItem)) {
                $nextChildItems = $parent->lastItem;
            } else {
                $nextChildItems = new EmptyListItems();
                $parent->childrenLength++;
                $parent->children[] =& $nextChildItems;
            }

            if ($depth < $depthNeeded) {
                $listItem = new EmptyListItem($this->lineNo);
                $nextChildItems->addItem($listItem);
            }

            $this->addChild($depth, $depthNeeded, $listItems, $childItem, $nextChildItems);
        } else {
            $childItems->addItem($childItem);
        }
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
