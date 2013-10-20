<?php
namespace WikiLingo\ExpressionParser;

class TableColumn
{
    public $value = '';

    public function __construct(&$parsed = null)
    {
        $this->append($parsed);
    }

    public function append($parsed)
    {
        if ($parsed != null) {
            $this->value .= $parsed->text;
        }
    }
}