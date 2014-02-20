<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class Ancestor
 * @package WikiLingo\Plugin
 */
class Ancestor extends Base
{
    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        return parent::render($plugin, $body, $parser);
    }
}