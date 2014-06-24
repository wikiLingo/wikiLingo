<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 1/7/14
 * Time: 4:47 PM
 */

namespace WikiLingo\Event;

/**
 * Class PostRender
 * @package WikiLingo\Event
 */
class PostRender extends Base
{
    /**
     * @param String $rendered
     * @return String
     */
    public function trigger(&$rendered)
    {
        foreach($this->delegates as $delegate)
        {
            return $delegate($rendered);
        }

        return $rendered;
    }
} 