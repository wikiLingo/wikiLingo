<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class PreFormattedText extends Base
{
    public function generate()
    {
        return '~pp~' . $this->expression->renderedChildren . '~/pp~';
    }
}