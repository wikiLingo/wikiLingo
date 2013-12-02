<?php
namespace WikiLingo\Expression;

class TableCell extends Base
{
    public function __construct($renderedChildren)
    {
        $this->renderedChildren = $renderedChildren;
    }

    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, "td");
	    $element->classes[] = 'table-cell';
	    $parser->scripts->addCss('td.table-cell{min-width:50px;}');

        $element->staticChildren[] = $this->renderedChildren;

        return $element->render();
    }
}