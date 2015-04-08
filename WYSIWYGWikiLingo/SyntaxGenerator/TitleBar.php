<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class TitleBar
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class TitleBar extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '-=' . $this->expression->renderedChildren . '=-';
    }
}