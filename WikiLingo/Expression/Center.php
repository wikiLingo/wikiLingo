<?php
namespace WikiLingo\Expression;
use WikiLingo;
use Types\Type;

/**
 * Class Center
 * @package WikiLingo\Expression
 */
class Center extends Base
{
    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render($renderer, $parser)
    {
        $element = Type::Element($renderer->element(__CLASS__, 'div'));
	    $parser->scripts->addCss('.center {text-align: center ! important;}');
        $element->classes[] = 'center';
        $element->staticChildren[] = $this->renderedChildren;
        $rendered = $element->render();
	    return $rendered;
    }
}