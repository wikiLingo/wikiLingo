<?php
namespace WikiLingo\Expression;

use WikiLingo;

/**
 * Class Char
 * @package WikiLingo\Expression
 */
class Char extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        return $this->parsed->text;
    }
}