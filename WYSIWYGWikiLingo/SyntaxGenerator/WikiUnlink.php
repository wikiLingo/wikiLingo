<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class WikiUnlink extends Base
{
    public function generate()
    {
        return '))' . $this->expression->renderedChildren . '((';
    }
}