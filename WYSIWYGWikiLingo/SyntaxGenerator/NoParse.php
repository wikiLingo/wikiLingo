<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class NoParse
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class NoParse extends Base
{
    /**
     * @return string
     */
    public function generate()
	{
		return '-~' . $this->expression->renderedChildren . '~-';
	}
}