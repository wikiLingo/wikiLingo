<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

abstract class Base
{
    public $renderer;
    public $expression;

    function __construct(&$renderer, &$expression)
    {
        $this->renderer = $renderer;
        $this->expression = $expression;
    }

    public abstract function generate();
}