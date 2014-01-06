<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Box
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Box extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '^' . $this->expression->renderedChildren . '^';
    }
}