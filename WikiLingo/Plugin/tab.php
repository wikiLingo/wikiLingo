<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class tab extends HtmlBase
{
    public $type = 'tab';
    public $htmlTagType = 'div';

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

        if (isset($plugin->parameters['title'])) {
            $plugin->parent->privateAttributes['titles'][$this->id($plugin->index)] = $plugin->parameters['title'];
        } else {
            $plugin->parent->privateAttributes['titles'][$this->id($plugin->index)] = '';
        }

        return parent::render($plugin, $body, $parser);
    }
}