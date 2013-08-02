<?php
namespace WikiLingo;

class Parsed extends ParserValue
{
	public $type;

	public $lines = array();
	public function addLine(Parsed &$line)
	{
		$this->lines[] =& $line;
	}

	public $siblings = array();
	public function addContent(Parsed &$sibling)
	{
		$this->siblings[] =& $sibling;
	}

	public $arguments = array();
	public function addArgument(Parsed &$argument)
	{
		$this->arguments[] =& $argument;
	}

	public function setType($type)
	{
		$this->type = $type;
        $this->setExpression();
	}

	public $options = array();
	public function setOption($key, $value)
	{
		$this->options[$key] = $value;
	}

	public $parent;
	public function setParent(Parsed &$parent)
	{
		$this->parent =& $parent;

        foreach($this->siblings as &$sibling) {
            $sibling->setParent($parent);
        }
	}

	public $children = array();
	public function addChild(Parsed &$child)
	{
		$this->children[] =& $child;
	}

    public $expression;
    public function setExpression()
    {
        $class = "WikiLingo\\Expression\\$this->type";
        if (class_exists($class)) {
            $expression = new $class($this);
            if ($expression) {
                $this->expression =& $expression;
            }
        }
    }
}