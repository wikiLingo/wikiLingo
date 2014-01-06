<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo\Expression;

/**
 * Class TableRows
 * @package WikiLingo\ExpressionParser
 */
class TableRows
{
    public $rows = array();
    public $length = 0;

    /**
     * @param $row
     */
    public function __construct($row)
    {
        $this->addRow($row);
    }

    /**
     * @param $row
     */
    public function addRow($row)
    {
	    if (isset($row->text)) {
            $this->rows[] = new Expression\TableRow($row->text);
	    } else {
		    //$this->rows[] = $row;
	    }
        $this->length++;
    }

    /**
     * @param $parser
     * @return string
     */
    public function render(&$parser)
    {
        $result = '';
        foreach($this->rows as $row) {
            $result .= $row->render($parser);
        }
        return $result;

    }
}