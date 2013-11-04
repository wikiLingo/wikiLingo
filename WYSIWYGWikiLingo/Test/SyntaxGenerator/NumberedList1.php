<?php
namespace WYSIWYGWikiLingo\Test\SyntaxGenerator;

use WikiLingoWYSIWYG;
use WikiLingo\Test\Expression as WikiLingoTestExpression;
use WYSIWYGWikiLingo\Test\Base;

class NumberedList1 extends Base
{
    public function __construct(WikiLingoWYSIWYG\Parser &$parser)
    {
	    $this->expected = (new WikiLingoTestExpression\NumberedList1())->source;
	    $this->source = $parser->parse($this->expected);
    }
}