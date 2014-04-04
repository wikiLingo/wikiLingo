<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class WikiUnlink
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class WordLink extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return $this->expression->renderedChildren;
    }
}