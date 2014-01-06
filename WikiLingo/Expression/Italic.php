<?php
namespace WikiLingo\Expression;

/**
 * Class Italic
 * @package WikiLingo\Expression
 */
class Italic extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'i');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}