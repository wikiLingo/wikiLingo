<?php
namespace WikiLingo\Plugin;
use WikiLingo;

class toc extends HtmlBase
{
	public $type = 'toc';
    public static $ordered = true;
	public $inlineOnly = true;

	function __construct()
	{
		$this->params = array(
			'type' => '',
			'maxdepth' => '',
			'title' => '',
			'showhide' => '',
			'nolinks' => '',
			'nums' => '',
			'levels' => ''
		);
	}

    public function render(WikiLingo\Expression\Plugin &$plugin, $body, &$parser)
    {
	    $result = '';
        if (!isset($parser->types['WikiLingo\Expression\Header'])) {
	        $rendered = parent::render($plugin, $result, $parser);
	        return $rendered;
        }

        $headers =& $parser->types['WikiLingo\Expression\Header'];
        $lastI = -1;
        $tagType = (self::$ordered ? 'ol' : 'ul');

        foreach ($headers as $key => $header) {
            if ($lastI > -1) {
                if ($lastI < $header->count) {
                    $difference = $header->count - $lastI;

                    $opening = "<" . $tagType . ">";
                    $result .= $opening;

                    if ($difference > 1) {
                        $result .= str_repeat('<li class="empty">' . $opening, $difference - 1);
                    }
                }

                if ($lastI > $header->count) {
                    $difference = $lastI - $header->count;

                    $closing = "</" . $tagType . ">";

                    $result .= $closing;

                    if ($difference > 1) {
                        $result .= str_repeat('</li>' . $closing, $difference - 1);
                    }
                }
            }
            $result .= '<li>' . $header->content->expression->render($parser);
            if ($key > 0) {
                $result .= '</li>';
            }
            $lastI = $header->count;
        }

        $rendered = parent::render($plugin, $result, $parser);
        return $rendered;
    }
}

class tocItems
{
	public $tocItem = [];
	public $lastItem;

	public function render()
	{

	}
}

class tocItem
{
	public $children = [];
	public $childrenLength = 0;

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
				$nextChildItems = new tocItemsEmpty();
				$parent->childrenLength++;
				$parent->children[] =& $nextChildItems;
			}

			if ($depth < $depthNeeded) {
				$listItem = new tocItemEmpty();
				$nextChildItems->addItem($listItem);
			}

			$this->addChild($depth, $depthNeeded, $listItems, $childItem, $nextChildItems);
		} else {
			$childItems->addItem($childItem);
		}
	}

	public function render()
	{

	}
}

class tocItemsEmpty extends tocItems
{
	public function render()
	{
		$itemsRendered = '';
		foreach($this->tocHeaderItems as $items)
		{
			$itemsRendered .= $items->render();
		}

		return '<ul>' . $itemsRendered . '</ul>';
	}
}

class tocItemEmpty extends tocItem
{
	public function render()
	{
		$itemsRendered = '<li>';

		foreach($this->children as $items)
		{
			$itemsRendered .= $items->render();
		}
		$itemsRendered .= '</li>';

		return $itemsRendered;
	}
}