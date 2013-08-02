<?php
namespace WikiLingo\Expression;
use WikiLingo;

class Center extends Base
{
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $this->element->addClass('center');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}