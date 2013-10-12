<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use WYSIWYGWikiLingo\SyntaxGenerator;

class Color extends Base
{
	public function generate()
	{
		return '~~' . $this->expression->style("color") . ":" . $this->expression->renderedChildren . '~~';
	}
}