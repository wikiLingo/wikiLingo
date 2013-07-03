<?php

class WikiLingo_Plugin_child extends WikiLingo_Plugin_HtmlBase
{
    public function render(&$plugin, &$parser)
    {
        $parent = $plugin->getParent();

        $parent->addTabTitle("");

        return parent::render($plugin, $parser);
    }
}