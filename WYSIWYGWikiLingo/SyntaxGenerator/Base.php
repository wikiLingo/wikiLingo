<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

abstract class Base
{
    public $parser;
    public $expression;

    function __construct(&$parser, &$expression)
    {
        $this->parser = $parser;
        $this->expression = $expression;
    }

    public abstract function generate();
}