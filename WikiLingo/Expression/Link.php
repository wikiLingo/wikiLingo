<?php

namespace WikiLingo\Expression;

use Types\Type;

class Link extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'a'));
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
