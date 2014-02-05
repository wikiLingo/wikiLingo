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
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = Type::Element($parser->element(__CLASS__, 'hr'));
        $element->setInline();
        return $element->render();
    }
}