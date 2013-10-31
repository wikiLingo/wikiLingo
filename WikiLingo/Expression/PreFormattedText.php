<?php
namespace WikiLingo\Expression;

class PreFormattedText extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'pre');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}