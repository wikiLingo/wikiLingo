<?php

namespace WYSIWYGWikiLingo\SyntaxGenerator;

use Types\Type;

/**
 * Class PastLink
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class PastLink extends Base
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