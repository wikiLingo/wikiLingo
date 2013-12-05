<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo\Expression;

class TableRow
{
    public $columns = array();
    public $length = 0;

    public function __construct(&$column = null) {
        $this->addColumn($column);
    }

    public function addColumn(&$column = null)
    {
        if ($column == null) {
            $this->columns[] = new Expression\TableCell("");
        } else {
            $this->columns[] = new Expression\TableCell($column->text->value);
        }

        $this->length++;
    }

    public function render($parser)
    {
        $result = '';

        foreach ($this->columns as $column) {
            $result .= $column->render($parser);
        }

        return $result;
    }
}