<?php

namespace WikiLingo;

class Render
{
	public $depth = 0;
	public $parser;

	function __construct(&$parser)
	{
		$this->parser = $parser;
	}

	public function render(Parsed &$parsed)
	{
		//children are directly part of the family as a visible child
        $renderedChildren = '';
		if ($parsed->childrenLength > 0) {
			$isParent = false;
			if (
				isset($parsed->expression->isParent)
				&& ($isParent = $parsed->expression->isParent) == true) {
				$this->depth++;
			}

	        foreach ($parsed->children as &$child) {
	            $renderedChildren .= $this->render($child);
	        }

			if ($isParent) {
				$this->depth--;
			}
		}

		//siblings are directly part of the family as a visible sibling
        $renderedSiblings = '';
        foreach ($parsed->siblings as &$sibling) {
            $renderedSiblings .= $this->render($sibling);
	        if ($parsed->parent != null) {
	            $parsed->parent->children[] =& $sibling;
	        }
        }

        $renderedLines = '';
        foreach ($parsed->lines as &$line) {
            $renderedLines .= $this->render($line);
        }

        $parsed->expression->renderedChildren =& $renderedChildren;
		if (isset($parsed->expression) && method_exists($parsed->expression, 'render')) {
			$rendered = $parsed->expression->render($this->parser, $this);
		} else {
			$rendered = '';
		}

        return $rendered . $renderedSiblings . $renderedLines;
	}
}