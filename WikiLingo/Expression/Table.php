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
     * @param WikiLingo\Renderer $renderer
     * @param WikiLingo\Parser $parser
     * @return mixed|string
     */
    public function render(&$renderer, &$parser)
    {
        $tableParser = new ExpressionParser\Table();
        $element = $renderer->element(__CLASS__, 'table');
        $table = $tableParser->parse($this->renderedChildren);

        $element->staticChildren[] = $table->render($renderer, $parser);
        $result = $element->render();
        return $result;
    }
}