<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class offspring
 * @package WikiLingo\Plugin
 */
class offspring extends Base
{
    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $parent = $plugin->parent();

        return parent::render($plugin, $body, $parser);
    }
}