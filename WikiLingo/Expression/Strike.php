<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Strike
 * @package WikiLingo\Expression
 */
class Strike extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = $renderer->element(__CLASS__, 'strike');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}