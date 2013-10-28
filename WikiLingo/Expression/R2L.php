<?php
namespace WikiLingo\Expression;

class R2L extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'span'));
        $element->attributes['dir'] = 'rtl';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}