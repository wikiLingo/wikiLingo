<?php
namespace WikiLingo\Expression;

class WikiUnlink extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}