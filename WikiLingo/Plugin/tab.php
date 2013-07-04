<?php
class WikiLingo_Plugin_tab extends WikiLingo_Plugin_HtmlBase
{
    public function render(&$plugin, &$parser)
    {
        if (isset($plugin->parameters['title'])) {
            //$this->parent->addTitle($plugin->parameters['title']);
        }

    }
}