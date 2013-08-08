<?php
namespace WikiLingo\Expression;

class Strike extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strike');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}