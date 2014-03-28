<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Bold
 * @package WikiLingo\Expression
 */
class Bold extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strong');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}