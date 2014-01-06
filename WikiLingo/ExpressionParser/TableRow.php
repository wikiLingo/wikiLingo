<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo\Expression;

/**
 * Class TableRow
 * @package WikiLingo\ExpressionParser
 */
class TableRow
{
    public $columns = array();
    public $length = 0;

    /**
     * @param null $column
     */
    public function __construct(&$column = null) {
        $this->addColumn($column);
    }

    /**
     * @param null $column
     */
    public function addColumn(&$column = null)
    {
        if ($column == null) {
            $this->columns[] = new Expression\TableCell("");
        } else {
            $this->columns[] = new Expression\TableCell($column->text->value);
        }

        $this->length++;
    }

    /**
     * @param $parser
     * @return string
     */
    public function render($parser)
    {
        $result = '';

        foreach ($this->columns as $column) {
            $result .= $column->render($parser);
        }

        return $result;
    }
}