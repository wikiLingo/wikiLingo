<?php
namespace WikiLingo\Expression;

use WikiLingo;
use WikiLingo\ExpressionParser;

class Table extends Base
{
	public $allowLineAfter = false;
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