<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class TableCell
 * @package WikiLingo\Expression
 */
class TableCell extends Base
{
    /**
     * @param \WikiLingo\Parsed $renderedChildren
     */
    public function __construct($renderedChildren)
    {
        $this->renderedChildren = $renderedChildren;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $renderer->element(__CLASS__, "td");
	    $element->classes[] = 'table-cell';
	    $parser->scripts->addCss('td.table-cell{min-width:50px;}');

        $element->staticChildren[] = $this->renderedChildren;

        return $element->render();
    }
}