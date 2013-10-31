<?php
namespace WikiLingo\Expression;

class Box extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $element->classes[] = 'box';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}