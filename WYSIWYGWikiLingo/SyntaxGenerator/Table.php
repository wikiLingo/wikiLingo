<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Table extends Base
{
    public function generate()
    {
        return '||' . $this->expression->renderedChildren . '||';
    }
}