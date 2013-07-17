<?php
// (c) Copyright 2002-2013 by authors of the Tiki Wiki CMS Groupware Project
//
// All Rights Reserved. See copyright.txt for details and a complete list of authors.
// Licensed under the GNU LESSER GENERAL PUBLIC LICENSE. See license.txt for details.
// $Id: List.php 44444 2013-01-05 21:24:24Z changi67 $

class WikiLingo_Expression_List extends WikiLingo_Expression
{
    public $blockStart;
    public $items = array();
	public $type = 'list';
	public $count = 0;
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

    function __construct(&$blockStart, &$content)
    {
	    $this->loc = $blockStart->loc;
        $this->blockStart = $blockStart;
	    $this->text = $content->text;
	    $len = $this->count = strlen($blockStart->text);
	    $this->type = self::$listTypes[$blockStart->text{0}];
	    if (isset(self::$listModifiers[$blockStart->text{$len - 1}])) {
		    $this->listModifier = self::$listModifiers[$blockStart->text{$len - 1}];
		    $this->modifierUsed = true;
		    $this->count--;
	    }
	    $this->items[] =& $this;
    }

	function addItem(&$item) {
		$this->items[] = $item;
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
				if ($lastI < $item->count) {
					$difference = $item->count - $lastI;

					$opening = "<" . $tagType . ">";
					$result .= $opening;

					if ($difference > 1) {
						$result .= str_repeat('<li class="empty">' . $opening, $difference - 1);
					}
				}

				if ($lastI > $item->count) {
					$difference = $lastI - $item->count;

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
			$lastI = $item->count;
		}

		//$child = new WikiLingo_Expression_Tag('<' . $tagType . '>', '</' . $tagType . '>', $result);
		return '<ul>' . $result . '</ul>';
	}

	/*public $stacks = array();
	public $index = 0;
	public $lineNumberLast;
	public $levelLast = 0;
	public $id;
	public $key;
	public $parser;

	function __construct(&$parser)
	{
		$this->parser = &$parser;
	}

	private function id()
	{
		return 'id' . microtime() * 1000000;
	}

	public function reset()
	{
		$this->stacks = array();
		$this->index = 0;
		$this->lineNumberLast = null;
		$this->levelLast = 0;
	}

	public function getEntity($lineNumber, $level)
	{
		if (
			$lineNumber != ($this->lineNumberLast + 1) ||
			!isset($this->lineNumberLast)
		) {
			$this->index++;
			$this->id = $this->id();
			$this->key = '§' . md5('list(id:' . $this->id . ',index:' . $this->index . ')') . '§';
			$this->stacks[$this->key] = array();

			$entity = $this->key;
		} else {
			$entity = '';
		}

		$this->lineNumberLast = $lineNumber;
		$this->levelLast = $level;

		return $entity;
	}

	public function stack($lineNumber, $level, $content, $type = '*')
	{
		$entity = $this->getEntity($lineNumber, $level);

		if ($level == 1) {
			$this->stacks[$this->key][] = array('content' => $content, 'type' => $type, 'children' => array());
		} else {
			$this->addToStack($this->stacks[$this->key], 1, $level, $content, $type);
		}

		return $entity;
	}

	private function addToStack(&$stack, $currentLevel, &$neededLevel, &$content, &$type)
	{
		if ($currentLevel < $neededLevel) {
			if (!isset($stack)) {
				$stack = array();
				$key = 0;
			} else {
				end($stack);
				$key = key($stack);
			}

			$key = max(0, $key);

			$this->addToStack($stack[$key]['children'], $currentLevel + 1, $neededLevel, $content, $type);
		} else {
			$stack[] = array('content' => $content, 'type' => $type);
		}
	}

	public function toHtml()
	{
		if (empty($this->stacks)) return;

		$lists = array();

		foreach ($this->stacks as $key => &$stack) {
			$lists[$key] = $this->toHtmlChildren($stack);
		}

		return $lists;
	}

	private function toHtmlChildren(&$stack)
	{
		global $headerlib;
		$length = count($stack);
		if ($length < 1) return ''; //if there isn't anything in this list, don't process it
		$lastParentTagType = '';
		$lastType = '';
		$id = '';
		$html = '';

		for ($i = 0; $i < $length; $i++) {
			$html .= $this->writeParentStartTag(isset($stack[$i]['type']) ? $stack[$i]['type'] : '*', $lastType, $lastParentTagType, $id);

			if (isset($stack[$i]) && empty($stack[$i]['content']) == false) {

				switch($stack[$i]['type']) {
					case '*-':
						$listType = "ToggleUnordered";
						break;
					case '#-':
						$listType = "ToggleOrdered";
						break;
					case '+':
						$listType = "Break";
						break;
					case '*':
						$listType = "Unordered";
						break;
					case '#':
						$listType = "Ordered";
						break;
					case ';':
						$listType = "Definition";
						break;
				}

				switch($stack[$i]['type']) {
					case '*-':
					case '#-':
						$headerlib->add_css("#" . $id . "{display: none;}");
					case '+':
					case '*':
					case '#':
						$html .= $this->parser->createWikiTag(
							"list" . $listType,
							"li",
							$stack[$i]['content'] . $this->toHtmlChildren($stack[$i]['children']),
							array("class" => "tikiListItem")
						);
						$html .= $this->advanceUntilNotType($i, $stack);
						break;
					case ';':
						$parts = explode(':', $stack[$i]['content']);
						$html .= $this->parser->createWikiTag("list" . $listType, "dt", $parts[0]);
						if (isset($parts[1])) {
							$html .= $this->parser->createWikiTag("list" . $listType . "Description", "dd", $parts[1]);
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
				);
			}
		}

		unset($stack);

		$html .= $this->writeParentEndTag($lastParentTagType);

		return $html;
	}

	private function writeParentStartTag($listType, &$lastListType, &$parentTagType, &$id)
	{
		$result = '';
		if ($listType != $lastListType && $this->lineCompatibility($listType, $lastListType) != true) {
			$preTag = '';
			if (empty($parentTagType) == false) {
				$result .= $this->writeParentEndTag($parentTagType);
			}

			$parentTagType = $this->parentTagType($listType);

			$id = $this->id();

			if ($listType == "*-" || $listType == "#-") {
				$preTag .= $this->parser->createWikiHelper("listBreak", "br", "", array(), "inline");
				$preTag .= $this->parser->createWikiHelper(
					"listButton",
					"a",
					"[+]",
					array(
						"id" => "flipper" . $id,
						"href" => "javascript:flipWithSign(\"" . $id . "\");",
						"class" => "link"
					)
				);
			}

			$lastListType = $listType;

			if ($listType == ";") {
				$tagListType = "listDefinitionParent";
			} else {
				$tagListType = "listParent";
			}

			$result .= $preTag . $this->parser->createWikiTag(
				$tagListType,
				$parentTagType,
				"",
				array(
					"class" => "tikiList",
					"id" => $id
				),
				"open"
			);
		}

		return $result;
	}

	private function lineCompatibility($thisListType = '', $lastListType = '')
	{
		if (
			($lastListType == "*" && $thisListType == "+") ||
			($lastListType == "+" && $thisListType == "*")
		) {
			return true;
		}

		if ($lastListType == $thisListType) {
			return true;
		}

		return false;
	}

	private function writeParentEndTag($parentTagType)
	{
		if (!empty($parentTagType)) {
			return $this->parser->createWikiTag("list", $parentTagType, "", array(), "close");
		} else {
			return "";
		}
	}

	private function parentTagType($listType = '')
	{
		switch ($listType) {
			case '*-':
			case '+':
			case '*':
				return 'ul';
				break;
			case '#-':
			case '#':
				return 'ol';
				break;
			case ';':
				return 'dl';
				break;
		}
	}

	private function advanceUntilNotType(&$i, &$stack, $type = "+")
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
				);
			} else {
				$i--;
				break;
			}
		}

		return $result;
	}*/
}
