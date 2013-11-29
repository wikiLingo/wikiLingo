<?php
namespace WikiLingoWYSIWYG\ExpressionSyntax;

class TitleBar extends Base
{
    public $icon = '';
    public $iconClass = 'icon-menu';
    public $group = 'misc';

    public function example()
    {
        return '-=expression=-';
    }
}