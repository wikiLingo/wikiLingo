<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/31/14
 * Time: 1:24 PM
 */

namespace WikiLingoWYSIWYG;

use WikiLingo;
use WikiLingo\Model\Element;
use WikiLingo\Model\Helper;

class Renderer extends WikiLingo\Renderer
{

    /**
     * @param $type
     * @param $name
     * @return Element
     */
    function element($type, $name)
    {
        $element = new Element($type, $name);
        $element->useDetailedAttributes = true;
        return $element;
    }

    /**
     * @param $name
     * @return Helper
     */
    function helper($name)
    {
        $helper = new Helper($name);
        $helper->useDetailedAttributes = true;
        return $helper;
    }
} 