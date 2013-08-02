<?php
namespace WikiLingo\Expression;

class Char extends Base
{
    public function render(&$parser)
    {
        return $this->parsed->text;
    }
}