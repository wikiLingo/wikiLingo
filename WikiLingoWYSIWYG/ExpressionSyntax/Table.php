<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingo;
use WikiLingo\ExpressionParser;

class Table extends Base
{
    public $icon = '';
    public $iconClass = 'icon-table';

	public function example()
    {
        return '';
"||expression|expression|expression\n
expression|expression|expression\n
expression|expression|expression||";
    }
}