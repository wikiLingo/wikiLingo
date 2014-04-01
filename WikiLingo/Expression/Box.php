<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Box
 * @package WikiLingo\Expression
 */
class Box extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $element->classes[] = 'box';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}