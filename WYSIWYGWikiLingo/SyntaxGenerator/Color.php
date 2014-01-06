<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

use WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Color
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Color extends Base
{
    /**
     * @return string
     */
    public function generate()
	{
        $color = $this->expression->style("color");
		return '~~' . $color . ":" . $this->expression->renderedChildren . '~~';
	}
}