<?php

namespace WikiLingo\Expression;
use WikiLingo;
use WikiLingo\Expression;

class ListBuilder
{
    public $type;
    public $items = array();

    function __construct($type)
    {
        $this->type = $type;
    }

    public function addItem(ListItem &$item)
    {
        $this->items[] = $item;
    }
}