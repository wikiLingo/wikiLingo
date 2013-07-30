<?php
namespace WikiLingo\Plugin;

class child extends HtmlBase
{
    public function render(&$plugin, &$parser)
    {
        $parent = $plugin->getParent();

        $parent->addTabTitle("");

        return parent::render($plugin, $parser);
    }
}