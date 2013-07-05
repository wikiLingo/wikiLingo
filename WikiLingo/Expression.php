<?php

class WikiLingo_Expression extends Jison_ParserValue
{
	public $stringBefore = '';
	public $stringAfter = '';
	public $parent;
	public $siblings = array();
	public $siblingsCount = 0;
	public $children = array();
	public $childrenCount = 0;
	public $childrenRenderFirst = true;
	public $staticContent;
    public $syntax;
    public $loc;

	public function __construct(&$before = null, $after = null, $staticContent = '')
	{
        if (isset($before)) {
            $this->stringBefore = $before->text;
            $this->stringAfter = (isset($after) ? $after->text : '');
            $this->staticContent = $staticContent;

            $this->loc = $before->loc;
            if (isset($after)) {
                $this->loc->lastColumn = $after->loc->lastColumn;
                $this->loc->lastLine = $after->loc->lastLine;
            }
        }
	}

    public function renderSiblings(&$parser)
    {
        $siblings = '';
        foreach($this->siblings as $sibling)
        {
            $sibling->text->parent =& $this->parent;
            $siblings .= $sibling->text->render($parser);
        }
        return $siblings;
    }

    public function renderChildren(&$parser)
    {
        $children = '';
        foreach($this->children as $child)
        {
            $child->text->parent =& $this->parent;
            $children .= $child->text->render($parser);
        }
        return $children;
    }

	public function render(&$parser)
	{
		$siblings = '';
		$children = '';
		$staticContent = '';

		if (!empty($this->staticContent)) {
			$staticContent = $this->staticContent;
		} else {
            $siblings = $this->renderSiblings($parser);
            $children = $this->renderChildren($parser);
		}

		return $this->stringBefore . $children . $staticContent . $this->stringAfter . $siblings;
	}

	public function addChild(&$child)
	{
		$child->parent =& $this->parent;
		$this->children[] = $child;
		$this->childrenCount++;
	}

	public function addSibling(&$sibling)
	{

        $this->siblings[] = $sibling;
        $this->siblingsCount++;

        if (isset($this->loc)) {
            $this->loc->lastLine = $sibling->loc->lastLine;
            $this->loc->lastColumn = $sibling->loc->lastColumn;
        } else {
            $this->loc = $sibling->loc;
        }
		return $this;
	}
}