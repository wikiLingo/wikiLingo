<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class WikiUnlink extends Base
{
    public $icon = '';
    public $iconClass = 'icon-blocked';
    public $group = 'link';

    public function example()
    {
        return '))expression((';
    }
}