<?php
namespace WikiLingo\Plugin;

class gmaps extends HtmlBase
{
    public $hasHtmlBody = false;
    public $htmlTagType = 'iframe';
    public $htmlAttributes = array(
        'id'=>'',
        'class'=>'',
        'style'=>'',
        'width'=>640,
        'height'=>480,
        'frameborder'=>0,
        'scrolling'=>"no",
        'marginheight'=>0,
        'marginwidth'=>0,
        'src'=>'',
    );

    public function render(&$plugin, &$parser)
    {
        $long = '';
        $lat = '';

        extract($plugin->parameters);

        $this->htmlAttributes['src'] = "https://maps.google.com/?ie=UTF8&amp;t=h&amp;ll=$long,$lat&amp;spn=0.063485,0.109863&amp;z=13&amp;output=embed";

        return parent::render($plugin, $parser);
    }
}

