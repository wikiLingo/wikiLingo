<?php
class WikiLingo_Plugin_flash extends WikiLingo_Plugin_HtmlBase

{

    public $type = 'flash';
    public $hasHtmlBody = false;
    public $htmlTagType = 'embed';
    public $htmlAttributes = array(
        'id'=>'',
        'class'=>'',
        'style'=>'',
        'width'=>640,
        'height'=>480,
        'src'=>'',
    );
    public function render(&$plugin, &$parser)
    {
        $movie = '';

        extract($plugin->parameters);

        $this->htmlAttributes['src'] = $movie;

        return parent::render($plugin, $parser);
    }
}

