<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;
use WikiLingo\Renderer;

class Parser extends WikiLingo\Parser
{
    public $wysiwyg = true;

    function element($type, $name)
    {
        $element = new Renderer\Element($type, $name);
        $element->useDetailedAttributes = true;
        return $element;
    }

    function helper($name)
    {
        $helper = new Renderer\Helper($name);
        $helper->useDetailedAttributes = true;
        return $helper;
    }
}