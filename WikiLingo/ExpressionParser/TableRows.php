<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo;
use WikiLingo\Expression;

/**
 * Class TableRows
 * @package WikiLingo\ExpressionParser
 */
class TableRows
{
    /**
     * @var TableRow[]
     */
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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return string
     */
    public function render($renderer, $parser)
    {
        $result = '';
        foreach($this->rows as $row) {
            $result .= $row->render($renderer, $parser);
        }
        return $result;

    }
}