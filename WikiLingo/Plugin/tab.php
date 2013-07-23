<?php
class WikiLingo_Plugin_tab extends WikiLingo_Plugin_HtmlBase
{
    public function render(&$plugin, &$parser)
    {
        if (isset($plugin->parameters['title'])) {

            $plugin->parent->parameters['titles'][] = $plugin->parameters['title'];
        } else {
            $plugin->parent->parameters['titles'][] = '';
        }

        $var = '';
    }
}