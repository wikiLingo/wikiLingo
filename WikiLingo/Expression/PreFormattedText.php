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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = $renderer->element(__CLASS__, 'pre');
        $element->staticChildren[] = $this->parsed->text;
        return $element->render();
    }
}