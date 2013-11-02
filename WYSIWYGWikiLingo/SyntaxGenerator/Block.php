<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Block extends Base
{
	public function generate()
	{
		$this->parsed->isBlock = true;
		$trailer = "";
		switch ($this->expression->parameter('data-block-type'))
		{
			case "unorderedListItem":
				$trailer = "\n" . str_repeat("*", $this->parser->renderer->depth);
				break;
			case "orderedListItem":
				$trailer = "\n" . str_repeat("#", $this->parser->renderer->depth);
				break;
			case "header":
				$trailer = "\n" . str_repeat("", $this->parser->renderer->depth);
				break;
		}

		return $trailer . $this->expression->renderedChildren;
	}
}