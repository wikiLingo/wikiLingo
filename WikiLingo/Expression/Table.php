<?php
namespace WikiLingo\Expression;

use WikiLingo;
use WikiLingo\ExpressionParser;

/**
 * Class Table
 * @package WikiLingo\Expression
 */
class Table extends Base
{
    /**
     * @var bool
     */
    public $allowLineAfter = false;

    /**
     * @param $parser
     * @return mixed
     */
    public function render(&$parser)
    {
        $tableParser = new ExpressionParser\Table();
        $element = $parser->element(__CLASS__, 'table');
        $table = $tableParser->parse($this->renderedChildren);

        $element->staticChildren[] = $table->render($parser);
        $result = $element->render();
        return $result;
    }
}