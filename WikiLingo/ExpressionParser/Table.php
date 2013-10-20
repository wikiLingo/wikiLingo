<?php
namespace WikiLingo\ExpressionParser;

class TableBase
{
    public function setInput($input)
    {
        parent::setInput($input);

        $this->begin('BOF');
    }
}