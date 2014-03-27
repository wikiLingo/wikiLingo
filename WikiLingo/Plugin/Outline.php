<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Events;

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
     * @param WikiLingo\Expression\Plugin $plugin
     * @param string $body
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $expandingOutline = parent::render($plugin, $body, $parser);

        return $expandingOutline;
    }
}