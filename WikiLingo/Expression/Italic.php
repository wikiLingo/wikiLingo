<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Italic
 * @package WikiLingo\Expression
 */
class Italic extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = $renderer->element(__CLASS__, 'i');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}