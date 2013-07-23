<?php
class WikiLingo_Plugin_tab extends WikiLingo_Plugin_HtmlBase
{
    public $type = 'tab';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$parser)
    {
        if (isset($plugin->parameters['title'])) {

            $plugin->parent->parameters['titles'][] = $plugin->parameters['title'];
        } else {
            $plugin->parent->parameters['titles'][] = '';
        }

        return parent::render($plugin, $parser);
    }
}