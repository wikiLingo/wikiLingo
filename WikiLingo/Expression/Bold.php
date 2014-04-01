<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Bold
 * @package WikiLingo\Expression
 */
class Bold extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $renderer->element(__CLASS__, 'strong');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}