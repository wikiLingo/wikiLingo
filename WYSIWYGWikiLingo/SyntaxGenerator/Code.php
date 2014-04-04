<?php
namespace WYSIWYGWikiLingo\SyntaxGenerator;

/**
 * Class Code
 * @package WYSIWYGWikiLingo\SyntaxGenerator
 */
class Code extends Base
{
    /**
     * @return string
     */
    public function generate()
    {
	    $mode = $this->expression->parameter('data-mode');

	    if ($mode == '') {
            return '-+' . $this->expression->renderedChildren . '+-';
	    } else {
		    return '-+' . $mode . "\n" . $this->expression->renderedChildren . '+-';
	    }
    }
}