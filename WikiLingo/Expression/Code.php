<?php
namespace WikiLingo\Expression;

/**
 * Class Code
 * @package WikiLingo\Expression
 */
class Code extends Base
{
    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, 'pre');
	    $element->detailedAttributes['contenteditable'] = 'false';
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}