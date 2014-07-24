<?php
/**
 * Created by PhpStorm.
 * User: robert
 * Date: 3/30/14
 * Time: 6:20 PM
 */

namespace WikiLingo;

use Exception;

class ExpressionInstantiator
{
    /**
     * @var Parser
     */
    public $parser;
    /**
     * @var bool
     */
    public $throwExceptions = false;

    /**
     * @param Parser $parser
     */
    public function __construct($parser)
    {
        $this->parser = $parser;
    }

    /**
     * @param Parsed $parsed
     * @throws Exception
     */
    public function set($parsed)
    {
        $class = "WikiLingo\\Expression\\$parsed->type";
        $parsed->expressionType = $class;

        if ($this->parser->skipExpressions == false) {
            if (class_exists($class)) {
                $expression = new $class($parsed);
                if ($expression) {
                    $parsed->expression = $expression;
                }
            } else if ($this->throwExceptions) {
                throw new Exception("Type '" . $parsed->type . "' does not exist in WikiLingo\\Expression namespace.");
            }
        }
    }
} 