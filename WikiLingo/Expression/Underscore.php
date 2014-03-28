<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Underscore
 * @package WikiLingo\Expression
 */
class Underscore extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'u');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}