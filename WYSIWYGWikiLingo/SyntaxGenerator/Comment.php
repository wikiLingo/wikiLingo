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
		return '~tc~' . $this->expression->renderedChildren . '~/tc~';
	}
}