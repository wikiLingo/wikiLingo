<?php

namespace WikiLingo;

class HtmlElement
{
    public $parsed = array();

    public $syntaxType;
    public $tagType;
    public $content;
    public $attributes;
    public $type;

    public $siblings = array();
    public $siblingsCount = 0;
    public $children = array();
    public $childrenCount = 0;
    public $childrenRenderFirst = true;

    function _construct($syntaxType, $tagType, $content = "", $attributes = array(), $type = "standard")
    {
        $this-> syntaxType = $syntaxType;
        $this->tagType = $tagType;
        $this->content = $content;
        $this->attributes = $attributes;
        $this->type = $type;
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
            $siblings .= $this->renderSiblings($parser);
            $children .= $this->renderChildren($parser);
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
        $this->siblings[] =& $sibling;
        $this->siblingsCount++;

        if (isset($this->loc)) {
            $this->loc->lastLine = $sibling->loc->lastLine;
            $this->loc->lastColumn = $sibling->loc->lastColumn;
        } else {
            $this->loc = $sibling->loc;
        }
        return $this;
    }

    public function addParsed(ParserValue &$parsed)
    {
        $this->parsed[] = $parsed;
    }
}