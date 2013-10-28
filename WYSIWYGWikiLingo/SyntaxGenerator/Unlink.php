<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Unlink extends Base
{
    public function generate()
    {
        return '))' . $this->expression->renderedChildren . '((';
    }
}