<?php

namespace WikiLingo\Plugin;
use WikiLingo;

class child extends WikiLingo\Plugin\HtmlBase
{
    public function render(&$plugin, &$parser)
    {
        $parent = $plugin->getParent();

        $parent->addTabTitle("");

        return parent::render($plugin, $parser);
    }
}