<?php
namespace WikiLingo\ExpressionParser;

/**
 * Class Table
 * @package WikiLingo\ExpressionParser
 */
class Table extends TableBase
{
    /**
     * @param $input
     */
    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }
}