<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use WYSIWYGWikiLingo\SyntaxGenerator;

class Color extends Base
{
	public function generate()
	{
        $color = $this->expression->style("color");
		return '~~' . $color . ":" . $this->expression->renderedChildren . '~~';
	}
}