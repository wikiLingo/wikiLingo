<?php
/**
 * Created by JetBrains PhpStorm.
 * User: GavinC
 * Date: 8/6/13
 * Time: 11:15 AM
 */
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Events;

class accordion extends Base
{
    public function __construct()
    {
        $this->htmlTagType = 'div';
        $this->draggable = false;

        $this->label = 'Accordion';
        $this->parameters['title'] = new Parameter('Title', '');
    }

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
        $header = $parser->helper('h3');
        $header->staticChildren[] = $plugin->parameter('title');

        $accordion = parent::render($plugin, $body, $parser);

        return $header->render() . $accordion;
    }
}