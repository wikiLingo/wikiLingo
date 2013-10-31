<?php
namespace WikiLingo\Expression;
use WikiLingo;
use Types\Type;

class Center extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'div'));
        $element->classes[] = 'center';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}