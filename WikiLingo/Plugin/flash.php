<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class flash extends Base
{
    public $hasHtmlBody = false;
    public $htmlTagType = 'embed';
    public $wysiwygTagType = 'img';
    public $attributes = array(
        'id'=>'',
        'class'=>'',
        'style'=>'',
        'width'=>640,
        'height'=>480,
        'src'=>''
    );

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $movie = '';

        if (isset($parser->wysiwyg)) {
            $plugin->attributes['src'] = 'img/emblem-multimedia.png';
        } else {
            extract($plugin->parameters);
            $plugin->attributes['src'] = $movie;
        }

        $flash = parent::render($plugin, $body, $parser);
	    return $flash;
    }
}

