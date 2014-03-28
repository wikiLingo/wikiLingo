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
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $element->classes[] = 'box';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}