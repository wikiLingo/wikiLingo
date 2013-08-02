<?php
namespace WikiLingo\Expression;

class Italic
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'i');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}