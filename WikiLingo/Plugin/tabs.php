<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

class tabs extends Base
{
    public $htmlTagType = 'div';
    public $wysiwygTagType = 'div';

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $plugin->allowLineAfter = false;
	    self::parameterDefaults($plugin->parameters);
	    $id = $plugin->id();

	    $parser->scripts->addScript(<<<JS
$(function() {
	var tabs = $('#$id');
	tabs.tabs();
});
JS
);
        if (!empty($plugin->privateAttributes['titles'])) {
	        $ul = Type::Helper($parser->helper('ul'));
	        foreach($plugin->privateAttributes['titles'] as $tabId => $title) {
		        $a = Type::Helper($parser->helper('a'));
		        $a->attributes['href'] = '#' . $tabId;
		        $a->staticChildren[] = $title;

		        $li = Type::Helper($parser->helper('li'));
		        $li->children[] = $a;
		        $ul->children[] = $li;
	        }

	        $body = $ul->render() . $body;
        }

        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

