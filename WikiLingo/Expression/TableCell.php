<?php
namespace WikiLingo\Expression;

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
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, "td");
	    $element->classes[] = 'table-cell';
	    $parser->scripts->addCss('td.table-cell{min-width:50px;}');

        $element->staticChildren[] = $this->renderedChildren;

        return $element->render();
    }
}