<?php
namespace WikiLingo\Plugin;

class tabs extends HtmlBase
{
    public $type = 'tabs';
    public $public = 'tabs';
    public $htmlTagType = 'div';

    public function render(&$plugin, &$body = '', &$parser)
    {

        if (isset($plugin->parameters['titles'])) {
            
        }

        $this->paramDefaults($plugin->parameters);

        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

