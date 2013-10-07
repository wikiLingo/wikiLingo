<?php
namespace WikiLingoWYSIWYG\Renderer;

use WikiLingo;

class Helper extends WikiLingo\Renderer\Helper
{
    public function __construct($name)
    {
        parent::__construct($name);
        $this->classes[] = 'wl-helper';
        $this->useDetailedAttributes = true;
    }
}