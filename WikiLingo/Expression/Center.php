<?php
namespace WikiLingo\Expression;
use WikiLingo;
use Types\Type;

class Center extends Base
{
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'div'));
	    $parser->scripts->addCss('.center {text-align: center ! important;}');
        $element->classes[] = 'center';
        $element->staticChildren[] = $this->renderedChildren;
        $rendered = $element->render();
	    return $rendered;
    }
}