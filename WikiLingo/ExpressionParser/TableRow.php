<?php
namespace WikiLingo\ExpressionParser;

use WikiLingo;
use WikiLingo\Expression;

/**
 * Class TableRow
 * @package WikiLingo\ExpressionParser
 */
class TableRow
{
    /**
     * @var TableColumn[]
     */
    public $columns = array();
    public $length = 0;

    /**
     * @param null $column
     */
    public function __construct($column = null) {
        $this->addColumn($column);
    }

    /**
     * @param null $column
     */
    public function addColumn($column = null)
    {
        if ($column == null) {
            $this->columns[] = new Expression\TableCell("");
        } else {
            $this->columns[] = new Expression\TableCell($column->text->value);
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

        foreach ($this->columns as $column) {
            $result .= $column->render($renderer, $parser);
        }

        return $result;
    }
}