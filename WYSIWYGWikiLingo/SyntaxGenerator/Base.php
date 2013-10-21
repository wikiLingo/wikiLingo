<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

abstract class Base
{
    public $parser;
    public $expression;
	public $parsed;
	public $children;

    public function __construct(&$parser, &$expression)
    {
        $this->parser =& $parser;
        $this->expression =& $expression;
	    $this->parsed =& $expression->parsed;

	    $this->children =& $expression->parsed->children;
    }

    public abstract function generate();
}