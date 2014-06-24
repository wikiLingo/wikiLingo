<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;
use WikiLingo;
use Types\Type;
use WikiLingoWYSIWYG;

class Center extends Base
{
    public $label = 'Center';
    public $icon = ' ';
    public $iconClass = 'icon-paragraph-center';
    public $group = 'common';

    public function example(WikiLingoWYSIWYG\Parser $parser)
    {
        return '::expression::';
    }
}