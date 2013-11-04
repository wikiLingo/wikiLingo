<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class WhiteSpace extends Base
{
    public function generate()
    {
        return $this->expression->renderedChildren;
    }
}