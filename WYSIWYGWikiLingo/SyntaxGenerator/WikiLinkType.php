<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class WikiLinkType extends Base
{
	public function generate()
	{
		return '((' . $this->expression->renderedChildren . '))';
	}
}