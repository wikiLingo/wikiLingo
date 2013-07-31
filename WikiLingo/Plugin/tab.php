<?php
namespace WikiLingo\Plugin;

class tab extends HtmlBase
{
    public $type = 'tab';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$body = '', &$parser)
    {
	    if (!isset($plugin->parent->parameters['titles'])) {
		    $plugin->parent->parameters['titles'] = array();
	    }

        if (isset($plugin->parameters['title'])) {
            $plugin->parent->parameters['titles'][$this->id($plugin->index)] = $plugin->parameters['title'];
        } else {
            $plugin->parent->parameters['titles'][$this->id($plugin->index)] = '';
        }

        return parent::render($plugin, $body, $parser);
    }
}