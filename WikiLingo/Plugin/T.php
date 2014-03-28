<?php
namespace WikiLingo\Plugin;

use WikiLingo;


/**
 * Class T
 * @package WikiLingo\Plugin
 */
class T extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Translatable';
        $this->htmlTagType = 'span';
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $body = $parser->events->triggerTranslate($body, 'WikiLingo\Plugin\T');

        return parent::render($plugin, $body, $parser);
    }
}