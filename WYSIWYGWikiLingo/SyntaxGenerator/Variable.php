<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Variable extends Base
{
    public function generate()
    {
        return '{{' . $this->expression->parameters["key"] . '}}';
    }
}