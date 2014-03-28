<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class PreFormattedText
 * @package WikiLingo\Expression
 */
class PreFormattedText extends Base
{
    /**
     * @param WikiLingo\Parser $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'pre');
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}