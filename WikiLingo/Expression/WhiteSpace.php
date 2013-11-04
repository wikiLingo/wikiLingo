<?php
namespace WikiLingo\Expression;
use Types\Type;
class WhiteSpace extends Base
{
    public function render(&$parser)
    {
	    $scripts = Type::Scripts($parser->scripts);
	    $scripts->addCss("span.whitespace {white-space: pre;}");
        $element = Type::Element($parser->element(__CLASS__, 'span'));
	    $element->classes[] = 'whitespace';
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}