<?php
namespace WikiLingo\Expression;

class TitleBar extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $element->classes[] = 'title';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}