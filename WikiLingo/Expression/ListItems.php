<?php

namespace WikiLingo\Expression;
use WikiLingo;
use WikiLingo\Expression;

class ListItems extends Base
{
    public $depth;
    public $items = array();
    public $itemsLength = 0;
    public $needed = false;
    public $lastItem;

    public $modifierUsed = false;
    public static $listModifiers = array(
        '-' => 'Toggle'
    );

    function __construct(WikiLingo\Parsed &$parsed, Block &$block)
    {
        $parser =& $parsed->parser;
        $listItem = new ListItem($parsed, $block);

        $syntax = $parsed->arguments[0]->text;
        $depth = $this->depth = strlen($syntax);
        if (isset(self::$listModifiers[$syntax{$depth - 1}])) {
            $this->listModifier = self::$listModifiers[$syntax{$depth - 1}];
            $this->modifierUsed = true;
            $this->depth--;
        }

        if ($parser->listsLength > 0) {
            $previousList =& $parser->lists[$parser->listsLength - 1];
            $previousItem =& $previousList->lastItem;
            $previousParsed =& $previousItem->parsed;
            $previousListLineNumber = $previousParsed->lineNo;
            $thisListLineNumber = $parsed->lineNo;
            if ($previousListLineNumber == $thisListLineNumber - 1) {
                $previousList->addItem($listItem);
            } else {
                $this->needed = true;
                $this->addItem($listItem);
                $parser->lists[] = $this;
                $parser->listsLength++;
            }
        } else {
            if ($depth > 1) {
                $emptyListItem = new EmptyListItem($parsed->lineNo);
                $emptyListItem->addChildren(1, $depth, $this, $listItem);
                $this->needed = true;
                $this->addItem($emptyListItem);
                $parser->lists[] = $this;
                $parser->listsLength++;
            } else {
                $this->needed = true;
                $this->addItem($listItem);
                $parser->lists[] = $this;
                $parser->listsLength++;
            }
        }
    }

    public function addItem(&$item)
    {
        $this->itemsLength++;
        $this->items[] =& $item;
        $this->lastItem =& $item;
    }

    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'ul');
        foreach ($this->items as &$item)
        {
            $element->staticChildren[] = $item->render($parser);
        }

        return $element->render();
    }
}