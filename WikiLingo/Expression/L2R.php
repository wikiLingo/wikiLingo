<?php
namespace WikiLingo\Expression;

use Types\Type;

class L2R extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'span'));
        $element->attributes['dir'] = 'ltr';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}