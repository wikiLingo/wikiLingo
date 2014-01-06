<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class SpecialChar
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class SpecialChar extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return htmlspecialchars_decode($this->expression->renderedChildren);
    }
}