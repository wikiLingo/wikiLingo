<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Italic extends Base
{
    public $label = 'Italics';
    public $icon = '';
    public $iconClass = 'icon-italic';
    public $group = 'font';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return "''expression''";
    }
}