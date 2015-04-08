<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Italic
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Italic extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return "''" . $this->expression->renderedChildren . "''";
    }
}