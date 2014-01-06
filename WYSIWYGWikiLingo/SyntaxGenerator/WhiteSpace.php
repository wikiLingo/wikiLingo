<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class WhiteSpace
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class WhiteSpace extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return $this->expression->renderedChildren;
    }
}