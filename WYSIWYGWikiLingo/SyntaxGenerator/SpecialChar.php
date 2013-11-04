<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class SpecialChar extends Base
{
    public function generate()
    {
        return htmlspecialchars_decode($this->expression->renderedChildren);
    }
}