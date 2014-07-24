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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = $renderer->element(__CLASS__, 'br');
	    $element->setInline();
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}