<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Unlink
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Unlink extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '))' . $this->expression->renderedChildren . '((';
    }
}