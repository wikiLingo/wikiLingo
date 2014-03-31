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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        return $this->parsed->text;
    }
}