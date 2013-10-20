<?php
namespace WikiLingo\ExpressionParser;

class Table extends TableBase
{
    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }
}