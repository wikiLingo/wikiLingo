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
		return '~np~' . $this->expression->renderedChildren . '~/np~';
	}
}