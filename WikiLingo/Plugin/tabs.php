<?php
class WikiLingo_Plugin_tabs extends WikiLingo_Plugin_HtmlBase
{
    public $public = 'tabs';

    public function render(&$plugin, &$parser)
    {
        $plugin->parameters['titles'] = array();

        $this->paramDefaults($plugin->parameters);

      


        $parsed = parent::render($plugin, $parser);

        return $parsed;
    }
}

