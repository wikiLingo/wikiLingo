<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Center
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Center extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '::' . $this->expression->renderedChildren . '::';
    }
}