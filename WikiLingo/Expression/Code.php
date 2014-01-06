<?php
namespace WikiLingo\Expression;

/**
 * Class Code
 * @package WikiLingo\Expression
 */
class Code extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'pre');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}