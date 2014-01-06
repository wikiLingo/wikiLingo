<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Underscore
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Underscore extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '===' . $this->expression->renderedChildren . '===';
    }
}