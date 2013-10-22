<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

class Comment extends Base
{
	public function generate()
	{
		return '~tc~' . $this->expression->renderedChildren . '~/tc~';
	}
}