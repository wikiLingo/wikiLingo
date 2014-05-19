<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class Menu
 * @package WikiLingo\Plugin
 */
class Menu extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->htmlTagType = 'nav';
        $this->draggable = true;

        $this->label = 'Menu';
        $this->detailedAttributes['contenteditable'] = 'true';
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$renderer, &$parser)
    {
        if (!$parser->wysiwyg) {
            $parser->scripts->addCss(<<<CSS
/*- NAVIGATION */
.Menu {
	background: #444444; /* Old browsers */

	box-shadow: inset #444 1px 1px 0, inset #444 -1px -1px 0;
	-moz-box-shadow: inset #444 1px 1px 0, inset #444 -1px -1px 0;
	min-height: 38px;
}
.Menu ul, .Menu li, div.menu ul, div.menu ul li, ul.menu, ul.menu li { list-style:none; padding:0; margin:0; display:inline; }
.Menu ul li{ float:left; position:relative; }
.Menu ul li a{
	display:block;
	padding:8px 12px;
	font-size:18px;
	white-space:nowrap;
	-webkit-transition: background .3s ease-in-out;
	-moz-transition: background .3s ease-in-out;
	-o-transition: background .3s ease-in-out;
}
.Menu ul li a:hover{ background:#222;}
.Menu ul ul{
	position:absolute;
	top:-99999px;
	left:0;
	opacity: 0; /* Hide sub level */
	-webkit-transition: opacity .5s ease-in-out;
	-moz-transition: opacity .5s ease-in-out;
	-o-transition: opacity .5s ease-in-out;
	background:#333;
	border-top:none;
	box-shadow:#111 0 3px 4px;
}
.Menu ul ul ul {
	position:absolute;
	top:-99999px;
	left:100%;
	opacity: 0;
	-webkit-transition: opacity .5s ease-in-out; /* Hide sub levels */
	-moz-transition: opacity .5s ease-in-out;
	-o-transition: opacity .5s ease-in-out;
}
.Menu ul li:hover>ul{ opacity: 1; position:absolute; top:99%; left:0; }
.Menu ul ul li:hover>ul{ position:absolute; top:0; left:100%; opacity: 1; background:#333; }
CSS
    );
        }
        $menu = parent::render($plugin, $body, $renderer, $parser);

        return $menu;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     */
    public function preRender(&$renderer)
    {
        $renderer->expressionManipulator['WikiLingo\Expression\Block'] = function(&$expression) {
            WikiLingo\Plugin\Menu\Block::mutate($expression);
        };
    }
}