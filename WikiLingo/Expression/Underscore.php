<?php
namespace WikiLingo\Expression;

/**
 * Class Underscore
 * @package WikiLingo\Expression
 */
class Underscore extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'u');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}