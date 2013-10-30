<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Block extends Base
{
	public function generate()
	{
		$trailer = "";

		if ($this->expression->hasClass('unorderedListItem'))
		{
			$trailer = "\n" . str_repeat("*", $this->parser->renderer->depth);
		}

		else if ($this->expression->hasClass('orderedListItem'))
		{
			$trailer = "\n" . str_repeat("#", $this->parser->renderer->depth);
		}

		else if ($this->expression->hasClass('header'))
		{
			$trailer = "\n" . str_repeat("", $this->parser->renderer->depth);
		}

		return $trailer . $this->expression->renderedChildren;
	}
}