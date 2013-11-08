<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class tab extends HtmlBase
{
    public $htmlTagType = 'div';

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

        if (isset($plugin->parameters['title'])) {
            $plugin->parent->privateAttributes['titles'][$plugin->id()] = $plugin->parameters['title'];
        } else {
            $plugin->parent->privateAttributes['titles'][$plugin->id()] = '';
        }

        return parent::render($plugin, $body, $parser);
    }
}