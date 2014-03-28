<?php
namespace WikiLingo\Plugin;

use WikiLingo\Utilities\Parameter;
use WikiLingo;

/**
 * Class FullpageSection
 * @package WikiLingo\Plugin
 */
class FullpageSection extends Base
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
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {
	    if (!isset($plugin->parent->privateAttributes['titles'])) {
		    $plugin->parent->privateAttributes['titles'] = array();
	    }

        $parser->scripts->addScript(<<<JS
$(".section:first").addClass("active");
JS
        );
        $id = $plugin->id();
        //$plugin->attributes['data-anchor'] = $id;
	    $plugin->parent->privateAttributes['titles'][$id] = $plugin->parameter('title');

        return parent::render($plugin, $body, $parser);
    }
}