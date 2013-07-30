<?php
namespace WikiLingo\Plugin;

class tab extends HtmlBase
{
    public $type = 'tab';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$body = '', &$parser)
    {
        if (isset($plugin->parameters['title'])) {

            $plugin->parent->parameters['titles'][] = $plugin->parameters['title'];
        } else {
            $plugin->parent->parameters['titles'][] = '';
        }

        return parent::render($plugin, $body, $parser);
    }
}