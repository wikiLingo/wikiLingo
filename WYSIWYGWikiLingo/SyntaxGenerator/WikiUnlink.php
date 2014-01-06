<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class WikiUnlink
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class WikiUnlink extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '))' . $this->expression->renderedChildren . '((';
    }
}