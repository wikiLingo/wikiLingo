<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Strike
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Strike extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
        return '--' . $this->expression->renderedChildren . '--';
    }
}
