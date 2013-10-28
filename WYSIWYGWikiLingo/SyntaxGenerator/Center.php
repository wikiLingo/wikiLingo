<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Center extends Base
{
    public function generate()
    {
        return '===' . $this->expression->renderedChildren . '===';
    }
}