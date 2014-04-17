<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class Permission
 * @package WikiLingo\Plugin
 */
class Permission extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->htmlTagType = 'div';
        $this->draggable = false;

        $this->label = 'Permission';
        $this->detailedAttributes['contenteditable'] = 'true';
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
        $this->permissible = false;
    }

    /**
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$renderer, &$parser)
    {
        if ($plugin->parsed->expressionPermissible || $parser->wysiwyg) {
            $result = parent::render($plugin, $body, $renderer, $parser);

            return $result;
        } else {
            return '';
        }
    }
}