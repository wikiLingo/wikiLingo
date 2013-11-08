<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class tabs extends HtmlBase
{
    public $htmlTagType = 'div';
    public $wysiwygTagType = 'div';
	public $parameters = array(
		'titles' => array()
	);

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $plugin->allowLineAfter = false;
	    $this->parameterDefaults($plugin->parameters);
	    $id = $plugin->id();

	    $parser->scripts->addScript(<<<JS
$(function() {
	var tabs = $('#$id');
	tabs.tabs();
});
JS
);
        if (!empty($plugin->privateAttributes['titles'])) {
	        $ul = $parser->helper('ul');
	        foreach($plugin->privateAttributes['titles'] as $tabId => $title) {
		        $a = $parser->helper('a');
		        $a->attributes['href'] = '#' . $tabId;
		        $a->staticChildren[] = $title;

		        $li = $parser->helper('li');
		        $li->children[] = $a;
		        $ul->children[] = $li;
	        }

	        $body = $ul->render() . $body;
        }

        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

