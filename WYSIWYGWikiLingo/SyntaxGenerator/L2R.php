<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class R2L extends Base
{
    public function generate()
    {
        return '{l2r}' . $this->expression->renderedChildren;
    }
}
