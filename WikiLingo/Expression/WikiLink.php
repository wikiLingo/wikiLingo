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
            $text = $sides[1];
            $href = $sides[0];
        } else {
            $text = $this->renderedChildren;
            $href = $this->renderedChildren;
        }

        $element->staticChildren[] = $text;
        $element->attributes['href'] = $href;

        return $element->render();
    }
}