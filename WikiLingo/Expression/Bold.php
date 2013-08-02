<?php
namespace WikiLingo\Expression;

class Bold extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strong');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}