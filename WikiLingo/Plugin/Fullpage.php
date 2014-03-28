<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

/**
 * Class Fullpage
 * @package WikiLingo\Plugin
 */
class Fullpage extends Base
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
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body = '', &$parser)
    {
	    $plugin->allowLineAfter = false;
	    $id = $plugin->id();
        $anchors = array();

        if (!$parser->wysiwyg) {
            if (!empty($plugin->privateAttributes['titles'])) {
                //menu
                $ul = Type::Helper($parser->helper('ul'));
                $ul->attributes['id'] = $id . '-menu';
                $i = 1;
                //anchors for sections
                foreach($plugin->privateAttributes['titles'] as $sectionId => $title) {
                    $link = Type::Helper($parser->helper('span'));
                    $link->attributes['href'] = $sectionId;
                    $link->attributes['onclick'] = <<<JS
$.fn.fullpage.moveTo($i);
return false;
JS;
;
                    $i++;
                    //$anchors[] = $a->attributes['data-index'] = $i++;
                    //$a->attributes['id'] = $sectionId . '-anchor';
                    $link->staticChildren[] = $title;
                    $li = Type::Helper($parser->helper('li'));
                    $li->children[] = $link;
                    $ul->children[] = $li;
                }

                $body .= $ul->render();


                $anchorsJson = json_encode($anchors);


                Type::Scripts($parser->scripts)
                    ->addScriptLocation('~/bower_components/fullPage.js/jquery.fullPage.js')
                    ->addCssLocation('~/bower_components/fullPage.js/jquery.fullPage.css')
                    ->addScript(<<<JS
    $(function() {
        $.fn.fullpage({
            anchors: {$anchorsJson},
            easing: 'easeInOutQuad',
            scrollSpeed: 1100,
            menu: '#{$id}-menu'
        });
    });
JS
                    )
                    ->addCss(<<<CSS
#{$id}-menu {
    height: 40px;
    left: 0;
    margin: 0;
    padding: 0;
    position: fixed;
    top: 0;
    width: 100%;
    list-style: none outside none;
}

#{$id}-menu li {
    background-color: rgba(255, 255, 255, 0.5);
    color: #000000;
    border-radius: 10px;
    display: inline-block;
    margin: 10px;
}

#{$id}-menu li.active {
    background-color: rgba(0, 0, 0, 0.5);
    color: #FFFFFF;
}

#{$id}-menu li span {
    display: block;
    padding: 9px 18px;
    text-decoration: none;
    color: inherit;
    cursor: pointer;
}

CSS
                    );
            }
        }
        $tabs = parent::render($plugin, $body, $parser);

        return $tabs;
    }
}

