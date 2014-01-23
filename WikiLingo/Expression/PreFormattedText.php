<?php
namespace WikiLingo\Expression;

/**
 * Class PreFormattedText
 * @package WikiLingo\Expression
 */
class PreFormattedText extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'pre');
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}