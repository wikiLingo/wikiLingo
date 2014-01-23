<?php
namespace WikiLingo\Plugin;

use WikiLingo;

/**
 * Class fullpage_section_slide
 * @package WikiLingo\Plugin
 */
class fullpage_section_slide extends Base
{
    /**
     *
     */
    public function __construct()
    {
        $this->label = 'FullPage Section Slide';
	    $this->attributes['class'] = 'slide';
        $this->htmlTagType = 'div';
        $this->allowLines = true;
        $this->draggable = false;
        $this->parameters['title'] = new Parameter('Title', '');
        $this->detailedAttributes['contenteditable'] = 'true';
        $this->allowWhiteSpace = true;
        $this->allowLines = true;
    }
}