<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Code extends Base
{
    public function generate()
    {
        return '-+' . $this->expression->renderedChildren . '+-';
    }
}