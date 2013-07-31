<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class tabs extends HtmlBase
{
    public $type = 'tabs';
    public $public = 'tabs';
    public $htmlTagType = 'div';
	public $parameters = array(
		'titles' => array()
	);

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $this->parameterDefaults($plugin->parameters);
	    $id = $this->id($plugin->index);
	    $parser->addScript(<<<JS
$(function() {
	var tabs = $('#$id');
	tabs.tabs();
});
JS
);
        if (!empty($plugin->parameters['titles'])) {
	        $ul = new WikiLingo\Helper('ul');
	        foreach($plugin->parameters['titles'] as $tabId => $title) {
		        $a = new WikiLingo\Helper('a');
		        $a->attributes['href'] = '#' . $tabId;
		        $a->staticChildren[] = $title;

		        $li = new WikiLingo\Helper('li');
		        $li->children[] = $a;
		        $ul->children[] = $li;
	        }

	        $body = $ul->render() . $body;
        }

        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

