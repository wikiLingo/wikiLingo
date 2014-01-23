<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class fullpage_section
 * @package WikiLingo\Plugin
 */
class fullpage_section extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'FullPage Section';
	    $this->attributes['class'] = 'section';
        $this->htmlTagType = 'div';
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
     * @param $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

	    $plugin->parent->privateAttributes['titles'][$plugin->id()] = $plugin->parameter('title');

        return parent::render($plugin, $body, $parser);
    }
}