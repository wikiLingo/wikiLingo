<?php

namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

class slider extends Base
{
    public function __construct()
    {
        $this->label = 'Slider';

        $this->htmlTagType = 'li';
        $this->draggable = false;

        $this->parameters['title'] = new Parameter('Title', '');
    }

	public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
	{
		$plugin->attributes['title'] = htmlspecialchars($plugin->parameters('title'));

		$slider = parent::render($plugin, $body, $parser);

		return $slider;
	}
} 