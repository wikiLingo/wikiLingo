<?php
namespace WikiLingo\Plugin;

use WikiLingo;
use WikiLingo\Utilities\Parameter;

/**
 * Class FullpageSectionSlide
 * @package WikiLingo\Plugin
 */
class FullpageSectionSlide extends Base
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