<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Underscore extends Base
{
    public $icon = '';
    public $iconClass = 'icon-underline';
    public $group = 'common';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '===expression===';
    }
}