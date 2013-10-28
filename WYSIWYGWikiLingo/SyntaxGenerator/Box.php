<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Box extends Base
{
    public function generate()
    {
        return '^' . $this->expression->renderedChildren . '^';
    }
}