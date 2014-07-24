<?php

namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

/**
 * Class Slider
 * @package WikiLingo\Plugin
 */
class Slider extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'Slider';

        $this->htmlTagType = 'div';
        $this->draggable = false;

        $this->parameters['title'] = new Parameter('Title', '');
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
		$plugin->attributes['title'] = htmlspecialchars($plugin->parameter('title'));

		$slider = parent::render($plugin, $body, $renderer, $parser);

		return $slider;
	}
} 