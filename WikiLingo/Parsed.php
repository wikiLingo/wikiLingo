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

	public $contents = array();
	public function addContent(Parsed &$content)
	{
		$this->contents[] =& $content;
	}

	public $arguments = array();
	public function addArgument(Parsed &$argument)
	{
		$this->arguments[] =& $argument;
	}

	public function setType($type)
	{
		$this->type = $type;
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
	}

	public $children = array();
	public function addChild(Parsed &$child)
	{
		$this->children[] =& $child;
	}
}