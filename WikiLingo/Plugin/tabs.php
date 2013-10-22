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
	    self::$scripts->addScript(<<<JS
$(function() {
	setTimeout(function() {
		var tabs = $('#$id');
		tabs.tabs();
	}, 3000);
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

