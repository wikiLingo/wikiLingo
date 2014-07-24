<?php
namespace WikiLingo\ExpressionParser;

/**
 * Class TableColumn
 * @package WikiLingo\ExpressionParser
 */
class TableColumn
{
    public $value = '';

    /**
     * @param null $parsed
     */
    public function __construct($parsed = null)
    {
        $this->append($parsed);
    }

    /**
     * @param $parsed
     */
    public function append($parsed)
    {
        if ($parsed != null) {
            $this->value .= $parsed->text;
        }
    }
}