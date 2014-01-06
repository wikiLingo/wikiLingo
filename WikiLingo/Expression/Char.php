<?php
namespace WikiLingo\Expression;

/**
 * Class Char
 * @package WikiLingo\Expression
 */
class Char extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        return $this->parsed->text;
    }
}