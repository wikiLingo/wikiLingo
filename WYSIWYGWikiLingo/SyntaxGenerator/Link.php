<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Link extends Base
{
	public function generate()
	{
		return '[' . $this->expression->renderedChildren . ']';
	}
}