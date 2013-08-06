<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Bold extends Base
{
    public function generate()
    {
        return '__' . $this->expression->renderedChildren . '__';
    }
}