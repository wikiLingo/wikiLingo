<?php

namespace WikiLingo\Plugin;
use WikiLingo;

class tabs extends WikiLingo\Plugin\HtmlBase
{
    public $type = 'tabs';
    public $public = 'tabs';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$parser)
    {

        $plugin->parameters['titles'] = array();

        $this->paramDefaults($plugin->parameters);

        $tabs = parent::render($plugin, $parser);

        return $tabs;
    }
}

