<?php
class WikiLingo_Plugin_tabs extends WikiLingo_Plugin_HtmlBase
{
    public $type = 'tabs';
    public $public = 'tabs';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$parser)
    {
        $id = 'tabs'.$this->id($plugin->index);

        $plugin->parameters['titles'] = array();

        $this->paramDefaults($plugin->parameters);

        $tabs = parent::render($plugin, $parser);

        return $tabs;
    }
}

