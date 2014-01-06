<?php
namespace WikiLingo\Expression;

/**
 * Class Bold
 * @package WikiLingo\Expression
 */
class Bold extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strong');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}