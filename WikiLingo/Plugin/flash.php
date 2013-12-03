<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class flash extends Base
{
    public $hasHtmlBody = false;
    public $htmlTagType = 'embed';
    public $parameters = array('movie' => '');
    public $attributes = array(
        'width'=>640,
        'height'=>480,
        'src'=>'img/emblem-multimedia.png'
    );

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {

        if (isset($plugin->parameters['movie'])) {
            $plugin->attributes['src'] = $plugin->parameters['movie'];
        }

        $flash = parent::render($plugin, $body, $parser);
	    return $flash;
    }
}

