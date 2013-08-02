<?php
namespace WikiLingo\Expression;

class ForcedLine extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'br');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}