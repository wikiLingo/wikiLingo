<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Bold
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Bold extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '__' . $this->expression->renderedChildren . '__';
    }
}