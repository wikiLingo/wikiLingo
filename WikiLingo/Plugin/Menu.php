<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

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
	    $this->parameters['fore-color'] = new Parameter('Fore Color', '#FFFFFF');
	    $this->parameters['accent-color'] = new Parameter('Accent Color', '#333');
	    $this->parameters['background-color'] = new Parameter('Background Color', '#444444');
	    $this->parameters['background-color-highlighted'] = new Parameter('Background Color', '#222');
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
	        $plugin->attributes['data-active'] = 'true';
	        $foreColor = $plugin->parameter("fore-color");
	        $accentColor = $plugin->parameter("accent-color");
	        $backgroundColor = $plugin->parameter("background-color");
	        $backgroundColorHighlighted = $plugin->parameter("background-color-highlighted");

            $parser->scripts->addCss(<<<CSS
/* Menu Start */
.Menu[data-active] {
	background: $backgroundColor; /* Old browsers */
	color: $foreColor;
	box-shadow: inset $backgroundColor 1px 1px 0, inset $backgroundColor -1px -1px 0;
	-moz-box-shadow: inset $backgroundColor 1px 1px 0, inset $backgroundColor -1px -1px 0;
	min-height: 38px;
	position: relative;
}
.Menu[data-active] ul, .Menu[data-active] li {
	list-style:none;
	padding:0;
	margin:0;
	display:inline;
}
.Menu[data-active] ul li{
	float:left;
	position:relative;
}
.Menu[data-active] ul li li{
    width: 100%;
}
.Menu[data-active] ul li a{
	display:block;
	padding:8px 12px 8px 12px;
	margin: 0;
	font-size:18px;
	white-space:nowrap;
	-webkit-transition: background .3s ease-in-out;
	-moz-transition: background .3s ease-in-out;
	-o-transition: background .3s ease-in-out;
	color: $foreColor;
	text-decoration: none;
}
.Menu[data-active] ul li a:hover{
	background:$backgroundColorHighlighted;
}
.Menu[data-active] ul ul{
	position:absolute;
	top:-99999px;
	left:0;
	opacity: 0; /* Hide sub level */
	-webkit-transition: opacity .5s ease-in-out;
	-moz-transition: opacity .5s ease-in-out;
	-o-transition: opacity .5s ease-in-out;
	background:$backgroundColor;
	border-top:none;
	box-shadow:$accentColor 0 3px 4px;
}
.Menu[data-active] ul ul ul {
	position:absolute;
	top:-99999px;
	left:100%;
	opacity: 0;
	-webkit-transition: opacity .5s ease-in-out; /* Hide sub levels */
	-moz-transition: opacity .5s ease-in-out;
	-o-transition: opacity .5s ease-in-out;
}
.Menu[data-active] ul li:hover>ul{
	opacity: 1;
	position:absolute;
	top:99%;
	left:0;
}
.Menu[data-active] ul ul li:hover>ul{
	position:absolute;
	top:0;
	left:100%;
	opacity: 1;
	background:$accentColor;
}

/* Menu End */
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
	    if (!$renderer->parser->wysiwyg) {
	        $renderer->expressionManipulator['WikiLingo\Expression\Block'] = function(&$expression) {
	            WikiLingo\Plugin\Menu\Block::mutate($expression);
	        };
	    }
    }
}