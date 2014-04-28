<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Comment
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Comment extends Base
{
    /**
     * @return string
     */
    public function generate()
	{
		return '/*' . $this->expression->renderedChildren . '*/';
	}
}