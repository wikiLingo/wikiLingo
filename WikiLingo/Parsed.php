<?php
namespace WikiLingo;

class Parsed extends ParserValue
{
	public $type;
    public $render;
    public $siblingIndex = 0;
    public $siblingsLength = 0;
    public $lineIndex = 0;
    public $linesLength = 0;

	public $lines = array();
	public function addLine(Parsed &$line)
	{
        $this->lineLength++;
        $line->lineIndex = $this->lineLength;

        $line->parent =& $this;
		$this->lines[$this->lineLength] =& $line;
	}
    public function previousLine()
    {
        $lineIndex = $this->lineIndex - 1;
        if ($lineIndex == 0) {
            return null;
        }
        $line = $this->parent->lines[$lineIndex];
        return $line;
    }
    public function nextLine()
    {
        $lineIndex = $this->lineIndex + 1;
        if ($lineIndex > $this->parent->lineLength) {
            return null;
        }
        return $this->parent->lines[$this->lineIndex + 1];
    }

	public $siblings = array();
	public function addContent(Parsed &$sibling)
	{
        $this->siblingsLength++;
        $sibling->siblingIndex = $this->siblingsLength;

        $this->siblings[$this->siblingsLength] =& $sibling;
	}
    public function previousSibling()
    {
        $siblingIndex = $this->siblingIndex - 1;
        if ($siblingIndex > $this->parent->siblingLength) {
            return null;
        }
        return $this->siblings[$siblingIndex];
    }
    public function nextSibling()
    {
        $siblingIndex = $this->siblingIndex + 1;
        if ($siblingIndex > $this->parent->siblingLength) {
            return null;
        }
        return $this->siblings[$siblingIndex];
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
    public function removeChildren()
    {
        $this->children = [];
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