<?php

namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

/**
 * Class sliders
 * @package WikiLingo\Plugin
 */
class sliders extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Slider';
        $this->htmlTagType = 'div';
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
	{
		$id = $plugin->id();
		$ul = Type::Helper($parser->helper('ul'));
		$ul->classes[] = 'bjqs';
		$ul->staticChildren[] = $body;

		Type::Scripts($parser->scripts)
			->addScriptLocation('WikiLingo/Plugin/slider/js/bjqs-1.3.js')
			->addCssLocation('WikiLingo/Plugin/slider/bjqs.css')

			->addScript(<<<JS
$(function() {
	var _$id = $('#$id');
	_$id.bjqs({
		height: _$id.parent().height(),
		width: _$id.parent().width(),
		responsive: true
	});
});
JS
			)
			->addCss(<<<CSS
/* Basic jQuery Slider essential styles */

ul.bjqs{position:relative; list-style:none;padding:0;margin:0;overflow:hidden; display:none;}
li.bjqs-slide{position:absolute; display:none;}
ul.bjqs-controls{list-style:none;margin:0;padding:0;z-index:9999;}
ul.bjqs-controls.v-centered li a{position:absolute;}
ul.bjqs-controls.v-centered li.bjqs-next a{right:0;}
ul.bjqs-controls.v-centered li.bjqs-prev a{left:0;}
ol.bjqs-markers{list-style: none; padding: 0; margin: 0; width:100%;}
ol.bjqs-markers.h-centered{text-align: center;}
ol.bjqs-markers li{display:inline;}
ol.bjqs-markers li a{display:inline-block;}
p.bjqs-caption{display:block;width:96%;margin:0;padding:2%;position:absolute;bottom:0;}


ul.bjqs-controls.v-centered li a{
	display:block;
	padding:10px;
	background:#fff;
	color:#000;
	text-decoration: none;
}

ul.bjqs-controls.v-centered li a:hover{
	background:#000;
	color:#fff;
}

ol.bjqs-markers li a{
	padding:5px 10px;
	background:#000;
	color:#fff;
	margin:5px;
	text-decoration: none;
}

ol.bjqs-markers li.active-marker a,
ol.bjqs-markers li a:hover{
	background: #999;
}

p.bjqs-caption{
	background: rgba(255,255,255,0.5);
}
CSS
			);

		$body = $ul->render();
		$sliders = parent::render($plugin, $body, $parser);
		return $sliders;
	}
} 