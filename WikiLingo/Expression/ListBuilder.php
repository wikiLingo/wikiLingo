<?php

namespace WikiLingo\Expression;
use WikiLingo;
use WikiLingo\Expression;

class ListBuilder
{
    public $items = array();
    public $needed = false;
    public $lastItem;

    function __construct(WikiLingo\Parsed &$parsed, Block &$block)
    {
        $parser =& $parsed->parser;
        $listBuilderItem = new ListBuilderItem($parsed, $block);

        if ($parser->listsLength > 0) {
            $previousList =& $parser->lists[$parser->listsLength - 1];
            $previousItem =& $previousList->lastItem;
            $previousParsed =& $previousItem->parsed;
            $previousListLineNumber = $previousParsed->lineNo;
            $thisListLineNumber = $parsed->lineNo;
            if ($previousListLineNumber == $thisListLineNumber - 1) {
                $previousList->addItem($listBuilderItem);
            } else {
                $this->needed = true;
                $this->addItem($listBuilderItem);
                $parser->lists[] = $this;
                $parser->listsLength++;
            }
        } else {
            $this->needed = true;
            $this->addItem($listBuilderItem);
            $parser->lists[] = $this;
            $parser->listsLength++;
        }
    }

    public function addItem(&$item)
    {
        $this->items[] =& $item;
        $this->lastItem =& $item;
    }
}