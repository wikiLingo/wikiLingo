<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

/**
 * Class Tab
 * @package WikiLingo\Plugin
 */
class Tab extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Tab';
        $this->htmlTagType = 'div';
        $this->permissibleParents = array('tabs');
        $this->allowLines = true;
        $this->draggable = false;
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
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

	    $plugin->parent->privateAttributes['titles'][$plugin->id()] = $plugin->parameter('title');

        return parent::render($plugin, $body, $renderer, $parser);
    }
}