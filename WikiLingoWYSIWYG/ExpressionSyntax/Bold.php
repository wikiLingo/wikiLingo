<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

use WikiLingoWYSIWYG;

class Bold extends Base
{
    public $label = 'Bold';
    public $icon = ' ';
    public $iconClass = 'icon-bold';
    public $group = 'common';

    public function example(WikiLingoWYSIWYG\Parser &$parser)
    {
        return '__expression__';
    }
}