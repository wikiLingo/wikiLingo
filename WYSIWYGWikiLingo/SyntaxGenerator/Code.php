<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Code
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Code extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '-+' . $this->expression->renderedChildren . '+-';
    }
}