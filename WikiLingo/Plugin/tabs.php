<?php
namespace WikiLingo\Plugin;

class tabs extends HtmlBase
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

