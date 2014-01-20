<?php

namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class PastLink
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class FLP extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        $element = Type::WYSIWYGElement($this->expression);

        return '@PastLink(' . $element->parameter('data-past')  . ')' . $this->expression->renderedChildren . '@)';
    }
}