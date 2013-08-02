<?php
namespace WikiLingo\Expression;

class Underscore extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'u');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}