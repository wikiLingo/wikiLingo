<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

/**
 * Class Accordion
 * @package WikiLingo\Plugin
 */
class Accordion extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->htmlTagType = 'div';
        $this->draggable = false;

        $this->label = 'Accordion Section';
        $this->parameters['title'] = new Parameter('Title', '');
        $this->detailedAttributes['contenteditable'] = 'true';
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
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
        $header = $renderer->helper('h3');
        $header->staticChildren[] = $plugin->parameter('title');

        $accordion = parent::render($plugin, $body, $renderer, $parser);

        return $header->render() . $accordion;
    }
}