<?php
namespace WikiLingo\Expression;

use WikiLingo;
/**
 * Class TableRow
 * @package WikiLingo\Expression
 */
class TableRow extends Base
{
    /**
     * @var
     */
    public $columns;

    /**
     * @param \WikiLingo\Parsed $row
     */
    public function __construct($row)
    {
        $this->columns = $row->columns;
    }

    /**
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $element = $renderer->element(__CLASS__, "tr");
        foreach ($this->columns as $column) {
            $element->staticChildren[] = $column->render($renderer, $parser);
        }
        return $element->render();
    }
}