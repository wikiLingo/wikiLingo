<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

/**
 * Class panes
 * @package WikiLingo\Plugin
 */
class fullpage extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Full Page Panes';
        $this->htmlTagType = 'div';
        $this->permissibleChildren = array('pane');
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $plugin->allowLineAfter = false;
	    $id = $plugin->id();

	    $parser->scripts->addScript(<<<JS
$(function() {
	var panes = $('#$id');
	panes.fullpage({
		anchors: [],
		easing: 'easeInOutQuad',
		scrollSpeed: 1100,
		menu: '#{$id}-menu'
	});
});
JS
);
        if (!empty($plugin->privateAttributes['titles'])) {
	        $ul = Type::Helper($parser->helper('ul'));
	        $ul->attributes['id'] = $id . '-menu';
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

