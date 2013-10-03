<?php

namespace WikiLingo;

class Render
{
	public $parser;

	function __construct(&$parser)
	{
		$this->parser = $parser;
	}

	public function render(Parsed &$parsed)
	{
		//children are directly part of the family as a visible child
        $renderedChildren = '';
        foreach ($parsed->children as &$child) {
            $renderedChildren .= $this->render($child);
        }

		//siblings are directly part of the family as a visible sibling
        $renderedSiblings = '';
        foreach ($parsed->siblings as &$sibling) {
            $renderedSiblings .= $this->render($sibling);
        }

        $renderedLines = '';
        foreach ($parsed->lines as &$line) {
            $renderedLines .= $this->render($line);
        }

        $parsed->expression->renderedChildren =& $renderedChildren;
		if (isset($parsed->expression) && method_exists($parsed->expression, 'render')) {
			$rendered = $parsed->expression->render($this->parser);
		} else {
			$rendered = '';
		}

        return $rendered . $renderedSiblings . $renderedLines;
	}
}