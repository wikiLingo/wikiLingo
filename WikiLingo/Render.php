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
        $renderedChildren = '';
        foreach ($parsed->children as &$child) {
            $renderedChildren .= $this->render($child);
        }

        $renderedSiblings = '';
        foreach ($parsed->siblings as &$sibling) {
            $renderedSiblings .= $this->render($sibling);
        }

        $renderedLines = '';
        foreach ($parsed->lines as &$line) {
            $renderedLines .= $this->render($line);
        }

        $parsed->expression->renderedChildren =& $renderedChildren;
		$rendered = $parsed->expression->render($this->parser);

        return $rendered . $renderedSiblings . $renderedLines;
	}
}