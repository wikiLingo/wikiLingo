<?php
namespace WikiLingo\Expression;

/**
 * Class Strike
 * @package WikiLingo\Expression
 */
class Strike extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strike');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}