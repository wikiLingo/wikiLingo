<?php

namespace WikiLingo\Event;

use WikiLingo\Parsed;
/**
 * Class PreParse
 * @package WikiLingo\Event
 */
class PreRender extends Base
{
    /**
     * @param Parsed $input
     * @return Parsed
     */
    public function trigger(Parsed &$input)
    {
        foreach($this->delegates as &$delegate)
        {
            return $delegate($input);
        }

        return $input;
    }
} 