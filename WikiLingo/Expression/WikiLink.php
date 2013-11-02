<?php

namespace WikiLingo\Expression;

use Types\Type;

class WikiLink extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'a'));
        $sides = explode("|", $this->renderedChildren);

        if (isset($sides[1])) {
            $href = array_shift($sides);
	        $text = implode("|", $sides);
        } else {
            $text = $this->renderedChildren;
            $href = $this->renderedChildren;
        }

        $element->staticChildren[] = $text;
        $element->attributes['href'] = $href;

	    $parser->trigger(__CLASS__, "render", $element);

        return $element->render();
    }
}