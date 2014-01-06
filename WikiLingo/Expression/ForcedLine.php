<?php
namespace WikiLingo\Expression;

/**
 * Class ForcedLine
 * @package WikiLingo\Expression
 */
class ForcedLine extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'br');
	    $element->setInline();
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}