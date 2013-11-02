<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

abstract class Base
{
    public $parser;
    public $expression;
	public $parsed;
	public $children;
	public $index;

    public function __construct(&$parser, &$expression)
    {
        $this->parser =& $parser;
        $this->expression =& $expression;
	    $this->parsed =& $expression->parsed;

	    $this->children =& $expression->parsed->children;

	    if (!isset($parser->typeIndex[__CLASS__])) {
		    $parser->typeIndex[__CLASS__] = 0;
	    }

	    $parser->typeIndex[__CLASS__]++;
	    $this->index = $parser->typeIndex[__CLASS__];
    }

    public abstract function generate();
}