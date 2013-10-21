<?php
namespace WikiLingo;

class ParsedCollection
{
	public $siblings = array();

	public function addSibling(&$sibling)
	{
		$this->siblings[] =& $sibling;
	}
}