<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Events;

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
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $header = $parser->helper('h3');
        $header->staticChildren[] = $plugin->parameter('title');

        $accordion = parent::render($plugin, $body, $parser);

        return $header->render() . $accordion;
    }
}