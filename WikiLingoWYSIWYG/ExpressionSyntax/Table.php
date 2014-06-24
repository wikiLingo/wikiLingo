<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use WikiLingo\ExpressionParser;
use WikiLingoWYSIWYG;

class Table extends Base
{
    public $label = 'Table';
    public $icon = '';
    public $iconClass = 'icon-table';

	public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return
"||&nbsp;|&nbsp;|&nbsp;\n
&nbsp;|&nbsp;|&nbsp;\n
&nbsp;|&nbsp;|&nbsp;||";
    }
}