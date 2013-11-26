<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class child extends HtmlBase
{
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $parent = $plugin->parent();

        return parent::render($plugin, $body, $parser);
    }
}