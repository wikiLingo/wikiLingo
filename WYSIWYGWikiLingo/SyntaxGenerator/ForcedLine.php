<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class ForcedLine
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class ForcedLine extends Base
{
    /**
     * @return string
     */
    public function generate()
	{
		return '%%%';
	}
}