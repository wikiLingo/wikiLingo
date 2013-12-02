<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo\Expression;

class TableRows
{
    public $rows = array();
    public $length = 0;

    public function __construct($row)
    {
        $this->addRow($row);
    }

    public function addRow($row)
    {
	    if (isset($row->text)) {
            $this->rows[] = new Expression\TableRow($row->text);
	    } else {
		    //$this->rows[] = $row;
	    }
        $this->length++;
    }

    public function render(&$parser)
    {
        $result = '';
        foreach($this->rows as $row) {
            $result .= $row->render($parser);
        }
        return $result;

    }
}