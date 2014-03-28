<?php

namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Link
 * @package WikiLingo\Expression
 */
class Link extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'a');
        $sides = explode("|", $this->renderedChildren);

        if (isset($sides[1])) {
            $element->detailedAttributes['data-href'] = $href = array_shift($sides);
	        $text = implode('|', $sides);
        } else {
            $href = $this->renderedChildren;
	        $text = $this->renderedChildren;
        }

        $element->staticChildren[] = $text;
        $element->attributes['href'] = $href;

        return $element->render();
    }
}
