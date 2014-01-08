<?php

namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class FLP
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

        return '@FLP(' . $element->parameter('data-past')  . ')' . $this->expression->renderedChildren . '@)';
    }
}