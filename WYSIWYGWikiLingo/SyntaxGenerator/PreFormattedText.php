<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class PreFormattedText
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class PreFormattedText extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '-/' . $this->expression->renderedChildren . '/-';
    }
}