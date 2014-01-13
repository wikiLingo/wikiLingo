<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Variable
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Variable extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '%' . $this->expression->parameters["key"] . '%';
    }
}