<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Underscore extends Base
{
    public $label = 'Underline';
    public $icon = '';
    public $iconClass = 'icon-underline';
    public $group = 'font';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return '===expression===';
    }
}