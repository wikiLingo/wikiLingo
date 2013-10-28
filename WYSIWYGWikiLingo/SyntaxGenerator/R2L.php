<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class R2L extends Base
{
    public function generate()
    {
        return '{r2l}' . $this->expression->renderedChildren;
    }
}
