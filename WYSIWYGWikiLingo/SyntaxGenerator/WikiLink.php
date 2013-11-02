<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class WikiLink extends Base
{
	public function generate()
	{
		return '((' . $this->expression->renderedChildren . '))';
	}
}