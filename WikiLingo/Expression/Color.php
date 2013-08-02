<?php
namespace WikiLingo\Expression;

class Color
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}