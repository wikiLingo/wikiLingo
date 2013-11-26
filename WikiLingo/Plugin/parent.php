<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class _parent_ extends HtmlBase
{

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        return parent::render($plugin, $body, $parser);
    }
}