<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class TitleBar
 * @package WikiLingo\Expression
 */
class TitleBar extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $renderer->element(__CLASS__, 'div');
        $element->classes[] = 'title';
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}