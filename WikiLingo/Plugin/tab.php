<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class tab extends Base
{
    public function __construct()
    {
        $this->label = 'Tab';
        $this->htmlTagType = 'div';
        $this->permissibleParents = array('tabs');
        $this->allowLines = true;
        $this->draggable = false;
        $this->parameters['title'] = new Parameter('Title', '');
    }

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

	    $plugin->parent->privateAttributes['titles'][$plugin->id()] = $plugin->parameter('title');

        return parent::render($plugin, $body, $parser);
    }
}