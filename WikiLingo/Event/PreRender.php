<?php

namespace WikiLingo\Event;

/**
 * Class PreParse
 * @package WikiLingo\Event
 */
class PreRender extends Base
{
    /**
     * @param String $input
     * @return String
     */
    public function trigger(&$input)
    {
        foreach($this->delegates as &$delegate)
        {
            return $delegate($input);
        }

        return $input;
    }
} 