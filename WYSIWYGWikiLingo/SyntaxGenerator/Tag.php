<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Tag extends Base
{
    public function generate()
    {
        return html_entity_decode($this->expression->renderedChildren);
    }
}