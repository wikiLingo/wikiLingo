<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class WhiteSpace
 * @package WikiLingo\Expression
 */
class WhiteSpace extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$parser)
    {
	    $scripts = $parser->scripts;
        $allowWhiteSpace = true;
        if ($parent = $this->parent()) {
            $parentExpression = $parent->expression;
            $allowWhiteSpace = $parentExpression->allowWhiteSpace;
        }
	    $scripts->addCss("span.whitespace {white-space: pre;}");
        $element = $parser->element(__CLASS__, 'span');

        if ($allowWhiteSpace == false)
        {
            $parser->scripts->addCss("span.hidden {display: none;content: ''}");
            $element->classes[] = 'hidden';
        }

	    $element->classes[] = 'whitespace';
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}