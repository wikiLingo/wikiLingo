<?php
namespace WikiLingo\Plugin;

class flash extends HtmlBase
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

    public function render(&$plugin, &$body, &$parser)
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

