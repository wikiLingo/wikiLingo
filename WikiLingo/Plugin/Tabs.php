<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class Tabs
 * @package WikiLingo\Plugin
 */
class Tabs extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Tabs';
        $this->htmlTagType = 'div';
        $this->permissibleChildren = array('tab');
        $this->minChildCount = 1;
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $plugin->allowLineAfter = false;
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

