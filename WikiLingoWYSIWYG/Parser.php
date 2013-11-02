<?php
namespace WikiLingoWYSIWYG;

use WikiLingo;

class Parser extends WikiLingo\Parser
{
    public $wysiwyg = true;

    function element($type, $name)
    {
        return new Renderer\Element($type, $name);
    }

    function helper($name)
    {
        return new Renderer\Helper($name);
    }
}