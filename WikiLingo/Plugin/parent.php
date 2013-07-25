<?php

namespace WikiLingo\Plugin;
use WikiLingo;

class _parent_ extends WikiLingo\Plugin\HtmlBase
{

    public function render(&$plugin, &$parser)
    {
        return parent::render($plugin, $parser);
    }
}