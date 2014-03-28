<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class Strike
 * @package WikiLingo\Expression
 */
class Strike extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'strike');
        $element->staticChildren[] = $this->renderedChildren;
        return $element->render();
    }
}