<?php
namespace WikiLingo\Expression;

class TableRow extends Base
{
    public $columns;

    public function __construct($row)
    {
        $this->columns = $row->columns;
    }

    public function render(&$parser)
    {
        $element = $parser->element(__CLASS__, "tr");
        foreach ($this->columns as $column) {
            $element->staticChildren[] = $column->render($parser);
        }
        return $element->render();
    }
}