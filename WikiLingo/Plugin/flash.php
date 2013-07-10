<?php
class WikiLingo_Plugin_flash extends WikiLingo_Plugin_HtmlBase

{

    public $type = 'flash';
    public $hasHtmlBody = false;
    public $htmlTagType = 'embed';
    public $wysiwygTagType = 'img';
    public $htmlAttributes = array(
        'id'=>'',
        'class'=>'',
        'style'=>'',
        'width'=>640,
        'height'=>480,
        'src'=>''
    );

    public function render(&$plugin, &$parser)
    {
        $movie = '';

        if (isset($parser->wysiwyg)) {
            $plugin->attributes['src'] = 'img/emblem-multimedia.png';
        } else {
            extract($plugin->parameters);
            $plugin->attributes['src'] = $movie;
        }

        return parent::render($plugin, $parser);
    }
}

