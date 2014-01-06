<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Tag
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Tag extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return html_entity_decode($this->expression->renderedChildren);
    }
}