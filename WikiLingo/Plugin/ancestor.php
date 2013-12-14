<?php
namespace WikiLingo\Plugin;

use WikiLingo;

class ancestor extends Base
{

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        return parent::render($plugin, $body, $parser);
    }
}