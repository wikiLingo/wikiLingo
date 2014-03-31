<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class ExpandingOutline
 * @package WikiLingo\Plugin
 */
class Outline extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->htmlTagType = 'div';
        $this->draggable = true;

        $this->label = 'Expanding Outline';
        $this->detailedAttributes['contenteditable'] = 'true';
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     */
    public function preRender(&$renderer)
    {
        $renderer->expressionManipulator['WikiLingo\Expression\BlockType\ListContainer'] = 'WikiLingo\Parser\OutLine\ListContainer';
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
        $expandingOutline = parent::render($plugin, $body, $renderer, $parser);

        return $expandingOutline;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     */
    public function postRender(&$renderer)
    {
        unset($renderer->expressionManipulator['WikiLingo\Expression\BlockType\ListContainer']);
    }
}