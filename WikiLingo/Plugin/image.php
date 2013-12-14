<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use Types\Type;

class image extends Base
{
    public function __construct()
    {
        $this->hasHtmlBody = false;
        $this->htmlTagType = 'img';
        $this->inLineOnly = true;

        $this->parameters = array(
            'location' => new Parameter('Location', ''),
            'title' => new Parameter('Title', '')
        );
    }

    public function render(WikiLingo\Expression\Plugin &$plugin, &$body, &$parser)
    {

        $plugin->attributes['src'] = $plugin->parameter('location');
	    $plugin->attributes['title'] = $plugin->parameter('title');

        $picture = parent::render($plugin, $body, $parser);
	    return $picture;
    }
}

