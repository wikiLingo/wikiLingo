<?php
namespace WikiLingo\Expression;

/**
 * Class WikiUnlink
 * @package WikiLingo\Expression
 */
class WikiUnlink extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}