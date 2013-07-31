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

		$rendered = $parsed->expression->render($this->parser, $renderedChildren);

        return $rendered . $renderedSiblings . $renderedLines;
	}
}