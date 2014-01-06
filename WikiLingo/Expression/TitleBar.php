<?php
namespace WikiLingo\Expression;

/**
 * Class TitleBar
 * @package WikiLingo\Expression
 */
class TitleBar extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'div');
        $element->classes[] = 'title';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}