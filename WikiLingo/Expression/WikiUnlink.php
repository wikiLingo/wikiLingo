<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class WikiUnlink
 * @package WikiLingo\Expression
 */
class WikiUnlink extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = $renderer->element(__CLASS__, 'span');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}