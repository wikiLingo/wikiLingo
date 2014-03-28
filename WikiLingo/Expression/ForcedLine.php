<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class ForcedLine
 * @package WikiLingo\Expression
 */
class ForcedLine extends Base
{
    /**
     * @param WikiLingo\Parser $parser
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