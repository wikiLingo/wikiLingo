<?php
namespace WikiLingo\Plugin;

class tabs extends HtmlBase
{
    public $type = 'tabs';
    public $public = 'tabs';
    public $htmlTagType = 'div';
	public $parameters = array(
		'titles' => array()
	);

    public function render(&$plugin, &$body = '', &$parser)
    {
	    $this->paramDefaults($plugin->parameters);

        if (isset($plugin->parameters['titles'])) {

        }

        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

