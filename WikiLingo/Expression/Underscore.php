<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Underscore
 * @package WikiLingo\Expression
 */
class Underscore extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $renderer->element(__CLASS__, 'u');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}