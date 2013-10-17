<?php
namespace WikiLingo\Expression;

class Table extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'table');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}