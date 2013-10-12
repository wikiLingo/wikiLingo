<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class NoParse extends Base
{
	public function generate()
	{
		return '~np~' . $this->expression->renderedChildren . '~/np~';
	}
}