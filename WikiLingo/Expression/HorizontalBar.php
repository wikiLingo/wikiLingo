<?php
namespace WikiLingo\Expression;

use WikiLingo;
use Types\Type;

/**
 * Class HorizontalBar
 * @package WikiLingo\Expression
 */
class HorizontalBar extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = Type::Element($renderer->element(__CLASS__, 'hr'));
        $element->setInline();
        return $element->render();
    }
}